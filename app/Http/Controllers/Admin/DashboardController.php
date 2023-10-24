<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreDashboardRequest;
use App\Http\Requests\UpdateDashboardRequest;
use App\Models\Dashboard;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Receipt;
use Illuminate\Support\Facades\DB;

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
        $order = DB::table('receipts')
            ->select(DB::raw('MONTH(order_date) as month'), DB::raw('SUM(total_price) as total'))
            ->where('status', 3)
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();
        $label = array();
        $data = array();
        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $total = 0;
            foreach ($order as $item) {
                $orderMonth = date('F', mktime(0, 0, 0, $item->month, 1));
                if ($month == $orderMonth) {
                    $total = $item->total;
                    break;
                }
            }
            $label[] = $month;
            $data[] = $total;
        }

        return view('Admin.dashBoard.dashboard',[
            'count_product' => $count_product,
            'count_employee' => $count_employee,
            'count_receipt' => $count_receipt,
            'total_price' => $total_price,
            'labels' => $label,
            'data' => $data,
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
