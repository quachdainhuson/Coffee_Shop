<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTableCoffeeRequest;
use App\Http\Requests\UpdateTableCoffeeRequest;
use App\Models\TableCoffee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TableCoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obj = new TableCoffee();
        $tables = $obj ->index();
        return view('Admin.Tables.table_management',[
            'tables' => $tables
        ]);
    }

    public function index1()
    {
        $obj = new TableCoffee();
        $tables = $obj ->index();
        return view('Admin.Tables.table',[
            'tables' => $tables
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Tables.add_table');
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
        $obj = new TableCoffee();
        $obj->id = $request->id;
        $tables = $obj->edit();
        return view('Admin.Tables.edit_table',[
            'tables' => $tables,
            'id' => $obj->id
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
