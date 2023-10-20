<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'cate_name' => 'required|unique:categories,cate_name',

        ];
    }
    public function messages()
    {
        return [
            'cate_name.required' => 'Tên danh mục không được để trống',
            'cate_name.unique' => 'Tên danh mục đã tồn tại',
        ];
    }
}
