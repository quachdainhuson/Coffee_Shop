<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Size;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('categories')->get();
        return view('Admin.Product.product',[
            'products' => $products
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();
        return view('Admin.Product.add_product',[
            'categories' => $categories,
            'sizes' => $sizes

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product_image = $request->file('product_image')->getClientOriginalName();
        if (!Storage::exists('public/Admin/'.$product_image)) {
            Storage::putFileAs('public/Admin', $request->file('product_image'), $product_image);
        }
        $productId = Product::create(array_merge($request->all(), ['product_image' => $product_image]));
        $product_id = $productId->id;
        foreach ($request->input('sizes') as $sizeId => $data) {
            ProductDetail::create([
                'product_id' => $product_id,
                'size_id' => $sizeId,
                'product_price' => $data['product_price'],
            ]);
        }
        return redirect()->route('products.product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, Request $request)
    {
        $product_detail = ProductDetail::with('sizes')->where('product_id','=', $product->id)->get();
        $categories = Category::all();
        $sizes = Size::all();
        return view('Admin.Product.edit_product',[
            'products' => $product,
            'categories' => $categories,
            'sizes' => $sizes,
            'product_detail' =>$product_detail
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($request->file('product_image') == null) {
            $product_image = $request->image_name;
        } else{
            $product_image = $request->file('product_image')->getClientOriginalName();
            if (!Storage::exists('public/Admin/'.$product_image)) {
                Storage::putFileAs('public/Admin', $request->file('product_image'), $product_image);
            }
            $product->product_image = $product_image;

        }
        $product->update(array_merge($request->all(), ['product_image' => $product_image]));
        foreach ($request->input('sizes') as $sizeId => $data) {
            ProductDetail::updateOrCreate(
                [
                    'product_id' => $product->id,
                    'size_id' => $sizeId,
                ],
                [
                    'product_price' => $data['product_price'],
                ]
            );
        }
        return redirect()->route('products.product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Request $request)
    {
        ProductDetail::with('sizes')->where('product_id','=', $product->id)->delete();
        $product->delete();
        return redirect()->route('products.product');
    }
    public function addToCart(Product $product, Request $request)
    {
        if(Session::has('cart')){

            $currentCart = Session::get('cart');
        }else{
            $currentCart = array();
        }
            $currentCart = Arr::add($currentCart, $product->id,
                [
                    'product_name' => $product->product_name,
                    'product_image' => $product->product_image,
                    'product_quantity' => 1,
                ]);
        Session::put('cart', $currentCart);
        return redirect()->route('products.cart');
    }
    public function cart()
    {

        Session::get('cart');
        return view('Admin.Product.cart');

    }
}
