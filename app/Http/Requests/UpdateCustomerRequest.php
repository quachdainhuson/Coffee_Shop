<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'customer_name' => 'required',
            'email' => 'required|email|unique:customers,email,'.$customer->id,
            'customer_phone' => 'required|numeric|unique:customers,customer_phone,'.$customer->id,
            'customer_address' => 'required',
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
            'customer_phone.unique' => 'Số điện thoại đã tồn tại',
        ];
    }
}
