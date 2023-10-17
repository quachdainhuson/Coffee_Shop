<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController
{
    public function index()
    {
        $sizes = Size::all();
        $products = Product::all();
        return view('Admin.order.order',[
            'products' => $products,
            'sizes' => $sizes
        ]);
    }
    public function addToCart(Product $product, Request $request){
        if (Session::has('cart_admin')) {
            $currentCart = Session::get('cart_admin');
        } else {
            $currentCart = [];
        }
        $quantity = 1;
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
        Session::put('cart_admin', $currentCart);
        return redirect()->route('orders.order');
    }
    public function updateCart(Request $request, Product $product){

        $currentCart = Session::get('cart_admin');
        foreach ($request->input('quantity') as $cartItemKey => $quantity) {
            $currentCart[$cartItemKey]['product_quantity'] = $quantity;
        }
        Session::put('cart_admin', $currentCart);
        return redirect()->route('orders.order');
    }
    public function deleteProductInCart($product_id){
        $currentCart = Session::get('cart_admin');
        unset($currentCart[$product_id]);
        Session::put('cart_admin', $currentCart);
        return redirect()->route('orders.order');
    }
    public function clearCart(){
        Session::forget('cart_admin');
        return redirect()->route('orders.order');
    }
}
