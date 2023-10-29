<?php

namespace App\Http\Controllers\Admin;




use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    public function loginCustomer()
    {
        return view('Client.login.login');
    }
    public function loginCustomerProcess(Request $request)
    {
        $account = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($account)){
            $customer = Auth::guard('customer')->user();
            Auth::guard('customer')->login($customer);
            Session::put('customer', $customer);
            flash()->addSuccess('Đăng nhập thành công');
            return redirect()->route('client.home');
        }else{
            flash()->addError('Đăng nhập thất bại');
            return redirect()->route('customer.login');
        }
    }
    public function logoutCustomer()
    {
        Auth::guard('customer')->logout();
        Session::forget('customer');
        flash()->addSuccess('Đăng xuất thành công');
        return redirect()->route('client.home');
    }
    public function registerCustomer()
    {

        return view('Client.login.register');
    }

}
