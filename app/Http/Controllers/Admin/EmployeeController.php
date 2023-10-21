<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\Receipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Testing\Fluent\Concerns\Has;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $employees = Employee::all();
        if(Session::get('employee')->role  == 1){
            return view('Admin/User/user',[
                'employees' => $employees
            ]);
        }else{
            flash()->addError('Bạn không có quyền truy cập');
             return redirect()->route('dashboard.dashboard');
        }

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
       Employee::create([
            'employee_name' => $request->employee_name,
            'employee_email' => $request->employee_email,
            'employee_phone' => $request->employee_phone,
            'username' => $request->username,
            'password' =>  Hash::make($request->password),
            'role' => $request->role

       ]);
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
        return view('Admin/User/edit_user',[
            'employees' => $employee
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {

        if (Hash::check($request->password, $employee->password)){
            Employee::where('id', $employee->id)->update([
                'employee_name' => $request->employee_name,
                'employee_email' => $request->employee_email,
                'employee_phone' => $request->employee_phone,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);

            flash()->addSuccess('Cập nhật thành công');
            return Redirect::route('users.user');

        }else{
            flash()->addError('Cập nhật thất bại');
            return Redirect::route('users.user');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee, Request $request)
    {
        Receipt::where('employee_id', $employee->id)->update([
            'employee_id' => null
        ]);
        $employee->delete();
        return Redirect::route('users.user');
    }
    public function changePassword(Request $request, Employee $employee){
        return view('Admin/User/change_password',[
            'employees' => $employee
        ]);
    }
    public function changePass(Request $request, Employee $employee){

        if (Hash::check($request->current_password, $employee->password)){
            if ($request->new_password == $request->confirm_password){
                Employee::where('id', $employee->id)->update([
                    'password' => Hash::make($request->new_password)
                ]);
                flash()->addSuccess('Cập nhật thành công');
                return Redirect::route('users.user');
            }else{
                flash()->addError('Mật khẩu không trùng khớp');
                return Redirect::route('users.user');
            }


        }else{
            flash()->addError('Cập nhật thất bại');
            return Redirect::route('users.user');
        }
    }

}
