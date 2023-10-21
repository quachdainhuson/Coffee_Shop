<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Models\Dashboard;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Receipt;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        $count_product = count($product);
        $employee = Employee::all();
        $count_employee = count($employee);
        $receipt = Receipt::where('status', 3)->get();
        $count_receipt = count($receipt);
        $total_price = Receipt::where('status', 3)->sum('total_price');
        return view('Admin.dashBoard.dashboard',[
            'count_product' => $count_product,
            'count_employee' => $count_employee,
            'count_receipt' => $count_receipt,
            'total_price' => $total_price
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
    public function store(StoreDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDashboardRequest $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
