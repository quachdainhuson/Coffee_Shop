<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        if ($request->password == $request->confirm_password){
            $customer = Customer::create([
                'customer_name' => $request->customer_name,
                'email' => $request->email,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'password' =>  Hash::make($request->password),
            ]);
            Session::put('customer', $customer);
            flash()->addSuccess('Đăng ký thành công');
            return redirect()->route('client.home');
        }
        else{
            flash()->addError('Mật khẩu không trùng khớp');
            return redirect()->route('customer.register');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer = Session::get('customer');
        $customer_id = $customer['id'];
        Customer::where('id', $customer_id)->
        update([
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
        ]);
        $customer_new = Customer::find($customer_id);
        Session::put('customer', $customer_new);
        flash()->addSuccess('Cập nhật thông tin thành công');
        return redirect()->route('client.customer');
    }
    public function changePassword( Request $request, Customer $customer)
    {
        if (Hash::check($request->old_password, $customer->password)){
            if ($request->new_password != $request->confirm_password){
                flash()->addError('Mật khẩu không trùng khớp');
                return redirect()->route('client.customer');
            }
            $customer = Session::get('customer');
            $customer_id = $customer['id'];
            $customer = Customer::find($customer_id);
            $customer->update([
                'password' => Hash::make($request->new_password)
            ]);
            Session::put('customer', $customer);
            flash()->addSuccess('Cập nhật mật khẩu thành công');
            return redirect()->route('client.customer');
        }else{
            flash()->addError('Mật khẩu cũ không đúng');
            return redirect()->route('client.customer');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
