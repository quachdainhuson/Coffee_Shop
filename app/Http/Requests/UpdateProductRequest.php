<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'product_name' => 'required',
            'product_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_description' => 'required',

        ];
    }
    public function messages()
    {
        return [

                'product_name.required' => 'Tên sản phẩm không được để trống',
                'product_image.image' => 'Ảnh không đúng định dạng',
                'product_image.mimes' => 'Ảnh không đúng định dạng',
                'product_image.max' => 'Ảnh không quá 2MB',
                'product_description.required' => 'Mô tả không được để trống',
        ];
    }
}
