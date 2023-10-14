<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\Controller;
use App\Http\Requests\StoreHomePageRequest;
use App\Http\Requests\UpdateHomePageRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\HomePage;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Receipt;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('Client.home',[
            'categories' => $categories
        ]);
    }
    public function product()
    {
        $products = Product::with('categories')->get();
        $categories = Category::all();
        return view('Client.product',[
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function cateProduct($id){
        $products = Product::where('cate_id',$id)->get();
        $categories = Category::all();
        return view('Client.product',[
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function detail(Product $product,Request $request)
    {
        $sizes = Size::all();
        $categories = Category::all();
        $products_detail = ProductDetail::join('sizes', 'sizes.id', '=', 'product_details.size_id')->
        where('product_id', $product->id)->get();

        return view('Client.product_detail',[
            'categories' => $categories,
            'sizes' => $sizes,
            'products_detail' => $products_detail,
            'products' => $product,

        ]);
    }
    public function cart()
    {
        $currentCart = Session::get('cart');
        return view('Client.cart',[
            'currentCart' => $currentCart,
        ]);
    }
    public function addToCart(Product $product, Request $request)
    {

        if($request->size_id == null){
            return redirect()->route('client.detail', $product);
        }
        if (Session::has('cart')) {
            $currentCart = Session::get('cart');
        } else {
            $currentCart = [];
        }
        $quantity = $request->input('product_quantity');
        $size_id = $request->input('size_id');
        $product_detail = ProductDetail::join('sizes', 'sizes.id', '=', 'product_details.size_id')
            ->select('product_details.*',
                'sizes.size_name')
            ->where('product_id', $product->id)
            ->where('size_id', $size_id)
            ->first();
        $cartItemKey = $product->id . '_' . $size_id;
        if (array_key_exists($cartItemKey, $currentCart)) {
            $currentCart[$cartItemKey]['product_quantity'] = $currentCart[$cartItemKey]['product_quantity'] + $quantity;
        } else {
            $currentCart[$cartItemKey] = [
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'product_image' => $product->product_image,
                'product_quantity' => $quantity,
                'size_id' => $size_id,
                'product_detail_id' => $product_detail->id,
                'size_name' => $product_detail->size_name,
                'price' => $product_detail->product_price,
            ];
        }
        Session::put('cart', $currentCart);
        return redirect()->route('client.cart');
    }
    public function updateCart(Request $request)
    {
        if ($request->input('quantity') == null) {
            return redirect()->route('client.cart');
        }
        $currentCart = Session::get('cart');
        foreach ($request->input('quantity') as $cartItemKey => $quantity) {
            $currentCart[$cartItemKey]['product_quantity'] = $quantity;
        }
        Session::put('cart', $currentCart);
        return redirect()->route('client.cart');
    }
    public function deleteCart(){
        Session::flush();
        return redirect()->route('client.cart');
    }
    public function deleteProductInCart($product_id, Request $request){
        $currentCart = Session::get('cart');
        unset($currentCart[$product_id]);
        Session::put('cart', $currentCart);
        return redirect()->route('client.cart');
    }
    public function checkout(){
        return view('Client.checkout');
    }
    public function checkoutProcess(Request $request){
        $customer = $request->all();
        $currentCart = Session::get('cart');
//        dd($customer);
        $customer_id = Customer::create($customer);
        $total_price = 0;
        $order_id = Receipt::create(
            [
                'status' => 0,
                'order_date' => date('Y-m-d'),
                'total_price' => $total_price,
                'customer_id' => $customer_id['id'],
                'note' =>  $customer['note'],
            ]);
        foreach ($currentCart as $cartItemKey => $cartItem){
            $total_price += $cartItem['product_quantity'] * $cartItem['price'];
            DB::table('receipt_details')->insert([
                'receipt_id' => $order_id['id'],
                'product_detail_id' => $cartItem['product_detail_id'],
                'size_name' => $cartItem['size_name'],
                'quantity' => $cartItem['product_quantity'],
                'price' => $cartItem['price'],
            ]);
        }
        Receipt::where('id', $order_id['id'])->update([
            'total_price' => $total_price,
        ]);
        Session::forget('cart');
        flash()->addSuccess('Đặt hàng thành công');
        flash()->addSuccess('Đơn hàng của bạn sẽ được xác nhận trong thời gian sớm nhất');

        return redirect()->route('client.home');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomePageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HomePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomePage $homePage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomePageRequest $request, HomePage $homePage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomePage $homePage)
    {
        //
    }
}
