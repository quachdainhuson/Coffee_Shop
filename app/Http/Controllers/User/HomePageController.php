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
use App\Models\ReceiptDetail;
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
        $products = Product::with('categories')->where('status', '=', '0')->get();
        $categories = Category::all();
        return view('Client.product',[
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function cateProduct($id){
        $products = Product::where('cate_id',$id)->where('status', '=', '0')->get();
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
        $size = Size::all();
        $categories = Category::all();
        $currentCart = Session::get('cart');
        return view('Client.cart',[
            'currentCart' => $currentCart,
            'categories' => $categories,
            'sizes' => $size
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
                'price' => $product_detail->product_price
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
        Session::forget('cart');
        return redirect()->route('client.cart');
    }
    public function deleteProductInCart($product_id, Request $request){
        $currentCart = Session::get('cart');
        unset($currentCart[$product_id]);
        Session::put('cart', $currentCart);
        return redirect()->route('client.cart');
    }
    public function checkout(){
        $size = Size::all();
        $categories = Category::all();
        if (!Session::has('customer')){
            flash()->addError('Bạn cần đăng nhập để thực hiện chức năng này');
            return redirect()->route('customer.login');
        }else{
            $customer = Session::get('customer');
            if(Session::get('cart') == null){
                flash()->addError('Giỏ hàng của bạn đang trống');
                return redirect()->route('client.cart');
            }else{
                return view('Client.checkout',[
                    'categories' => $categories,
                    'sizes' => $size,
                    'customer' => $customer,
                ]);
            }
        }

    }

    public function searchProduct(Request $request){
        $categories = Category::all();
        $products = Product::where('product_name', 'like','%' .$request->key. '%')->where('status', '=', '0')
                                    ->get();
        if ($products->isEmpty()){
            $products = Product::join('categories', 'categories.id', '=', 'products.cate_id')
                ->select('products.*',
                    'categories.cate_name')
                ->where('categories.cate_name', 'like','%' .$request->key. '%')
                ->where('status', '=', '0')
                ->get();
        }

        return view('Client.product',[
            'products' => $products,
            'categories' => $categories
        ]);
    }


    public function origin(){
            $categories = Category::all();
            return view('Client.origin',[
                'categories' => $categories
         ]);
    }

    public function service(){
        $categories = Category::all();
        return view('Client.service',[
            'categories' => $categories
     ]);
}
    public function searchReceipt(Request $request){
        $categories = Category::all();
        $receipts = Receipt::where('id', $request->key)->get();
        return view('Client.search_receipt',[
            'receipts' => $receipts,
            'categories' => $categories
        ]);
    }
    public function searchReceiptProcess(Request $request){
        $categories = Category::all();
        $receipts = DB::table('receipts')
            ->join('customers', 'customers.id', '=', 'receipts.customer_id')
            ->select('receipts.*',
                'customers.id',
                'customers.customer_name',
                'customers.customer_phone',
                'customers.customer_address',
                'customers.email')
            ->where('customers.customer_phone', $request->input('customer_phone'))
            ->get();

        return view('Client.search_receipt',[
            'receipts' => $receipts,
            'categories' => $categories,
        ]);
    }
    public function job(){
        $categories = Category::all();
        return view('Client.job',[
            'categories' => $categories
        ]);

    }
    public function customer(){
        $customer = Session::get('customer');
        $categories = Category::all();
        return view('Client.customer_information',[
            'categories' => $categories,
            'customer' => $customer
        ]);
    }
    public function historyOrder(){
        $customer = Session::get('customer');
        $categories = Category::all();
        $receipts = Receipt::where('customer_id', $customer['id'])->get();
        $orderObj = new Receipt();
        $order = $orderObj->getOrder();
        $orderDetailOrder = new ReceiptDetail();
        $arrOrderDetail = array();
        foreach ($order as $item){
            $orderDetailOrder->receipt_id = $item->id;
            $orderDetail = $orderDetailOrder->getOrderDetail();
            foreach ($orderDetail as $itemDetail){
                $arrOrderDetail[] = $itemDetail;
            }
        }
        return view('Client.history_order',[
            'categories' => $categories,
            'receipts' => $receipts,
            'customer' => $customer,
            'orders' => $order,
            'arrOrderDetails' => $arrOrderDetail
        ]);
    }
    public function checkoutProcess(Request $request, $note){

        $currentCart = Session::get('cart');
        $customer_id = Session::get('customer')->id;
        $total_price = 0;
        $order_id = Receipt::create(
            [
                'status' => 0,
                'order_date' => date('Y-m-d'),
                'total_price' => $total_price,
                'order_at' => 'Website',
                'customer_id' => $customer_id,
                'note' => $note
            ]);
        foreach ($currentCart as $cartItemKey => $cartItem){
            $total_price += $cartItem['product_quantity'] * $cartItem['price'];
            DB::table('receipt_details')->insert([
                'receipt_id' => $order_id['id'],
                'product_detail_id' => $cartItem['product_detail_id'],
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
    public function paymentVnPay(Request $request){
        Session::put('data', $request->all());
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/Client/checkout_process".'/'.$request['note'];
        $vnp_TmnCode = "IKAWFNTY";//Mã website tại VNPAY
        $vnp_HashSecret = "SCVNUFEGHJVOUBFMNPUNMCCVVIZQUWGM"; //Chuỗi bí mật

        $vnp_TxnRef = rand(00,9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán đơn hàng';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request['total'] *100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            Session::put('data', $request->all());
            header('Location: ' . $vnp_Url);

            die();
        } else {
            echo json_encode($returnData);
        }


    }
    public function editCustomer(Request $request){

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
