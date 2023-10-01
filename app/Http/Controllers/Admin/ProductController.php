<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Size;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obj = new Product();
        $products = $obj->index();
        return view('Admin.Product.product',[
            'products' => $products
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $objCate = new Category();
        $categories = $objCate->index();
        $objSize = new Size();
        $sizes = $objSize->index();
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
        $obj = new Product();
        $obj->product_name = $request->product_name;
        $obj->product_description = $request->product_description;
        $obj->cate_id = $request->cate_id;
        $product_id = $obj->store();
//        dd($product_id);
        foreach ($request->input('sizes') as $sizeId => $data) {
            $productDetail = new ProductDetail();
            $productDetail->product_id = $product_id;
            $productDetail->size_id = $sizeId;
            $productDetail->price = $data['product_price'];
            $productDetail->store();
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
        $objProduct = new Product();
        $objProduct->id = $request->id;
        $products = $objProduct->edit();
        $objCate = new Category();
        $categories = $objCate->index();
        $objSize = new Size();
        $sizes = $objSize->index();

        return view('Admin.Product.edit_product',[
            'categories' => $categories,
            'sizes' => $sizes,
            'id' => $objProduct->id,
            'products' => $products['products'],
            'product_detail' =>$products['products_detail']
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $obj = new Product();
        $obj->id = $request->id;
        $obj->product_name = $request->product_name;
        $obj->product_description = $request->product_description;
        $obj->cate_id = $request->cate_id;
        $obj->updateProduct();
        foreach ($request->input('sizes') as $sizeId => $data) {
            $productDetail = new ProductDetail();
            $productDetail->product_id = $request->id;
            $productDetail->size_id = $sizeId;
            $productDetail->price = $data['product_price'];
            $productDetail->updateProductDetail();
        }
        return redirect()->route('products.product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Request $request)
    {
        $obj = new Product();
        $obj->id = $request->id;
        $obj->deleteProduct();
        return redirect()->route('products.product');
    }
}
