<?php

namespace App\Http\Controllers\Admin;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController
{
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
            flash()->addSuccess('Đăng nhập thành công');
            return redirect()->route('dashboard.dashboard');
        }else{
            flash()->addError('Đăng nhập thất bại');
            return redirect()->route('users.login');
        }
    }
    public function logout()
    {
        Auth::guard('employee')->logout();
        Session::forget('employee');
        return redirect()->route('users.login');
    }
}
