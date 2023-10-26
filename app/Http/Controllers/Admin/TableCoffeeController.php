<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTableCoffeeRequest;
use App\Http\Requests\UpdateTableCoffeeRequest;
use App\Models\TableCoffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TableCoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $current_employee = Session::get('employee');
        $obj = new TableCoffee();
        $tables = $obj ->index();
        return view('Admin.Tables.table_management',[
            'tables' => $tables,
            'current_employee' => $current_employee
        ]);
    }

    public function index1()
    {
        $current_employee = Session::get('employee');
        $obj = new TableCoffee();
        $tables = $obj ->index();
        return view('Admin.Tables.table',[
            'tables' => $tables,
            'current_employee' => $current_employee
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $current_employee = Session::get('employee');
        return view('Admin.Tables.add_table',[
            'current_employee' => $current_employee
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTableCoffeeRequest $request)
    {
        $obj = new TableCoffee();
        $obj->table_name = $request->table_name;
        $obj->table_status = $request->table_status;
        $obj->store();
        return Redirect::route('tables.table_management');
    }

    /**
     * Display the specified resource.
     */
    public function show(TableCoffee $tableCoffee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TableCoffee $tableCoffee, Request $request)
    {
        $current_employee = Session::get('employee');
        $obj = new TableCoffee();
        $obj->id = $request->id;
        $tables = $obj->edit();
        return view('Admin.Tables.edit_table',[
            'tables' => $tables,
            'id' => $obj->id,
            'current_employee' => $current_employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableCoffeeRequest $request, TableCoffee $tableCoffee)
    {
        $obj = new TableCoffee();
        $obj -> id = $request -> id;
        $obj -> table_name = $request -> table_name;
        $obj->table_status = $request->table_status;
        $obj -> updateTable();
        return Redirect::route('tables.table_management');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TableCoffee $tableCoffee, Request $request)
    {
        $obj = new TableCoffee();
        $obj -> id = $request->id;
        $obj -> deleteTable();
        return Redirect::route('tables.table_management');
    }
}
