<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return
            [
            'product_name.required'=> 'Nhập Tên Sản Phẩm',
            'product_description.required' => 'Nhập Mô Tả Sản Phẩm',
            'product_image.required' => 'Xin Mời Nhập Ảnh',
        ];
    }
}
