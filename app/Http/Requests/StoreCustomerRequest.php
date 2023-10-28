<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'customer_name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'customer_phone' => 'required|numeric',
            'customer_address' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'customer_name.required' => 'Tên khách hàng không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'customer_phone.required' => 'Số điện thoại không được để trống',
            'customer_phone.numeric' => 'Số điện thoại không đúng định dạng',
            'customer_address.required' => 'Địa chỉ không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'confirm_password.required' => 'Xác nhận mật khẩu không được để trống',
            'confirm_password.min' => 'Xác nhận mật khẩu phải có ít nhất 6 ký tự',
        ];
    }
}
