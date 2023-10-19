<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'employee_email' => 'required|email|unique:employees,employee_email',
            'username' => 'required|unique:employees,username',
            'employee_phone' => 'required|numeric|unique:employees,employee_phone',
        ];
    }
    public function messages()
    {
        return [
            'employee_email.required' => 'Email không được để trống',
            'employee_email.email' => 'Email không đúng định dạng',
            'employee_email.unique' => 'Email đã tồn tại',
            'username.required' => 'Tên đăng nhập không được để trống',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'employee_phone.required' => 'Số điện thoại không được để trống',
            'employee_phone.numeric' => 'Số điện thoại phải là số',
            'employee_phone.unique' => 'Số điện thoại đã tồn tại',
        ];
    }
}
