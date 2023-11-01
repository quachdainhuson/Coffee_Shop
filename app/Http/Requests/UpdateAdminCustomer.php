<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminCustomer extends FormRequest
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
        $customer = $this->route('customer');
        return [
            'customer_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email,'.$customer->id,
            'customer_phone' => 'required|numeric|digits:10|unique:customers,customer_phone,'.$customer->id,
            'customer_address' => 'required|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'customer_name.required' => 'Tên khách hàng không được để trống',
            'customer_name.string' => 'Tên khách hàng phải là chuỗi',
            'customer_name.max' => 'Tên khách hàng không được quá 255 ký tự',
            'email.required' => 'Email không được để trống',
            'email.string' => 'Email phải là chuỗi',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email không được quá 255 ký tự',
            'email.unique' => 'Email đã tồn tại',
            'customer_phone.required' => 'Số điện thoại không được để trống',
            'customer_phone.numeric' => 'Số điện thoại phải là số',
            'customer_phone.digits' => 'Số điện thoại phải có 10 chữ số',
            'customer_phone.unique' => 'Số điện thoại đã tồn tại',
            'customer_address.required' => 'Địa chỉ không được để trống',
            'customer_address.string' => 'Địa chỉ phải là chuỗi',
            'customer_address.max' => 'Địa chỉ không được quá 255 ký tự',
        ];
    }
}
