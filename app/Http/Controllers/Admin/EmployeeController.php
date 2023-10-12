<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obj = new Employee();
        $employees = $obj->index();
        return view('Admin/User/user',[
            'employees' => $employees
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin/User/add_user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $obj = new Employee();
        $obj->employee_name = $request->employee_name;
        $obj->employee_email = $request->employee_email;
        $obj->employee_phone = $request->employee_phone;
        $obj->username = $request->username;
        $obj->password = $request->password;
        $obj->role = $request->role;
        $obj->store();
        return Redirect::route('users.user');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee, Request $request)
    {
        $obj = new Employee();
        $obj->id = $request->id;
        $employees = $obj->edit();
        return view('Admin/User/edit_user',[
            'employees' => $employees,
            'id' => $obj->id
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $obj = new Employee();
        $obj->id = $request->id;
        $obj->employee_name = $request->employee_name;
        $obj->employee_email = $request->employee_email;
        $obj->employee_phone = $request->employee_phone;
        $obj->username = $request->username;
        $obj->password = $request->password;
        $obj->role = $request->role;
        $obj->updateEmployee();
        return Redirect::route('users.user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee, Request $request)
    {
        $obj = new Employee();
        $obj->id = $request->id;
        $obj->destroyUser();
        return Redirect::route('users.user');
    }
    public function login()
    {
        return view('Admin.login.login');
    }
    public function loginProcess(Request $request)
    {
        $account = $request->only('username', 'password');
        if (Auth::guard('employee')->attempt($account)){
            $employee = Auth::guard('employee')->user();
            Auth::guard('employee')->login($employee);
            Session::put('employee', $employee);
            return redirect()->route('users.user');
        }else{
            return redirect()->route('users.login');
        }




    }
}
