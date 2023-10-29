<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreReceiptRequest;
use App\Http\Requests\UpdateReceiptRequest;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Receipt;
use App\Models\ReceiptDetail;
use App\Models\TableCoffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $current_employee = Session::get('employee');
        $employee = Employee::all();
        $receipt = Receipt::orderBy('status', 'asc')->get();
        return view('Admin.receipt.receipt',[
            'receipts' => $receipt,
            'employees' => $employee,
            'current_employee' => $current_employee
        ]);
    }
    public function detail(Receipt $receipt){
        $size = DB::table('sizes')
            ->select('sizes.*')
            ->get();
        $current_employee = Session::get('employee');
        $customer = DB::table('customers')
            ->select('customers.*')
            ->where('customers.id', '=', $receipt->customer_id)
            ->get();

        $receipt_detail = DB::table('receipts')
            ->select('receipt_details.*',
                'receipts.id as receipt_id',
                'receipts.total_price',
                'receipts.status as receipt_status',
                'receipts.customer_id as receipt_customer_id',
                'receipts.employee_id as receipt_employee_id',
            )
            ->join('receipt_details', 'receipts.id', '=', 'receipt_details.receipt_id')
            ->where('receipt_details.receipt_id', '=', $receipt->id)
            ->get();
        $product_detail =DB::table('receipts')
            ->select('products.product_name', 'product_details.*', 'receipts.*', 'receipt_details.*')
            ->join('receipt_details', 'receipt_details.receipt_id', '=', 'receipts.id')
            ->join('product_details', 'product_details.id', '=', 'receipt_details.product_detail_id')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->where('receipts.id', $receipt->id)
            ->get();

        return view('Admin.receipt.receipt_detail',
            [
                'receipt_details' => $receipt_detail,
                'receipt' => $receipt,
                'customer' => $customer,
                'product_details' => $product_detail,
                'current_employee' => $current_employee,
                'sizes' => $size
            ]);
    }
    public function confirm(Receipt $receipt){
        Receipt::where('id', $receipt->id)->update(['status' => 1]);
        return redirect()->route('receipts.receipt');
    }

    public function print(Receipt $receipt){
        Receipt::where('id', $receipt->id)->update(['status' => 2]);
        return redirect()->route('receipts.receipt');
    }
    public function completeReceipt(Receipt $receipt){

        TableCoffee::where('id', $receipt->table_id)->update(['table_status' => 1]);
        Receipt::where('id', $receipt->id)->update(['status' => 3]);
        return redirect()->route('receipts.receipt');
    }
    public function deliveryReceipt(Receipt $receipt){
    Receipt::where('id', $receipt->id)->update(['status' => 5]);
    return redirect()->route('receipts.receipt');
}
    public function cancelReceipt(Receipt $receipt){
        TableCoffee::where('id', $receipt->table_id)->update(['table_status' => 1]);
        Receipt::where('id', $receipt->id)->update(['status' => 4]);
        return redirect()->route('receipts.receipt');
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
    public function store(StoreReceiptRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReceiptRequest $request, Receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receipt $receipt)
    {
        //
    }
}
