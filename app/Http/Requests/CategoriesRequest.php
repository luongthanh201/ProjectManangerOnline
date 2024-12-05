<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'projectcount' => 'required|integer|max:10', // Kiểm tra số nguyên và không vượt quá 10
            'status' => 'required|in:active,inactive',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống.',
            'max' => ':attribute không được vượt quá :max ký tự.',
            'integer' => ':attribute phải là một số nguyên.',
            'status.in' => ':attribute không hợp lệ. Chỉ được chọn active hoặc inactive.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes()
    {
        return [
            'name' => 'Tên danh mục',
            'description' => 'Mô tả',
            'projectcount' => 'Số lượng dự án',
            'status' => 'Trạng thái',
        ];
    }
}
