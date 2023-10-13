<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreReceiptRequest;
use App\Http\Requests\UpdateReceiptRequest;
use App\Models\Receipt;
use App\Models\ReceiptDetail;
use Illuminate\Support\Facades\DB;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receipt = Receipt::all();
        return view('Admin.receipt.receipt',[
            'receipts' => $receipt
        ]);
    }
    public function detail(Receipt $receipt){
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
            ->where('receipts.id', 12)
            ->get();

        return view('Admin.receipt.receipt_detail',
            [
                'receipt_details' => $receipt_detail,
                'receipt' => $receipt,
                'customer' => $customer,
                'product_details' => $product_detail
            ]);
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
