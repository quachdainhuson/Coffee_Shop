<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Receipt;
use App\Models\Size;
use App\Models\TableCoffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController
{
    public function index()
    {
        $current_employee = Session::get('employee');
        $table = TableCoffee::all();
        $sizes = Size::all();
        $products = Product::all()->where('status', 0);
        $product_detail = ProductDetail::with('sizes')->get();
        return view('Admin.order.order',[
            'products' => $products,
            'sizes' => $sizes,
            'tables' => $table,
            'product_details' => $product_detail,
            'current_employee' => $current_employee
        ]);
    }
    public function addToCart(Product $product, Request $request){

        if($request->size_id == null){
            return redirect()->route('orders.order');
        }
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
    public function checkoutProcess(Request $request){
        if (Session::has('cart_admin')){
            $table_id = $request->input('table_id');
            $currentCart = Session::get('cart_admin');
            $current_employee = Session::get('employee');
            $total_price = 0;
            $receipt = Receipt::create([
                'status' => 1,
                'total_price' => $total_price,
                'note' => '',
                'order_date' => date('Y-m-d'),
                'order_at' => 'Cửa hàng',
                'employee_id' => $current_employee->id,
                'table_id' => $table_id,
            ]);
            foreach ($currentCart as $cartItem) {
                $total_price += $cartItem['price'] * $cartItem['product_quantity'];
                DB::table('receipt_details')->insert([
                    'receipt_id' => $receipt['id'],
                    'product_detail_id' => $cartItem['product_detail_id'],
                    'quantity' => $cartItem['product_quantity'],
                    'price' => $cartItem['price'],
                ]);
            }
            Receipt::where('id', $receipt['id'])->update([
                'total_price' => $total_price,
            ]);
            TableCoffee::where('id', $table_id)->update([
                'table_status' => 2,
            ]);
            Session::forget('cart_admin');
            flash()->addSuccess('Đặt hàng thành công');
            return redirect()->route('orders.order');
        }
        flash()->addError('Giỏ hàng trống');
        return redirect()->route('orders.order');



    }
}
