<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'name' => 'required|max:50',
            'content' => 'required|max:1000',
            'priority' => 'required|in:High,Medium,Low',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages()
    {
        return [
            'name.required' => 'Nội dung không được để trống.',
            'name.max' => 'Nội dung không được vượt quá :max ký tự.',
            'content.required' => 'Nội dung không được để trống.',
            'content.max' => 'Nội dung không được vượt quá :max ký tự.',
            'priority.required' => 'Độ ưu tiên không được để trống.',
            'priority.in' => 'Độ ưu tiên không hợp lệ. Chỉ được chọn High, Medium, hoặc Low.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes()
    {
        return [
            'content' => 'Nội dung',
            'status' => 'Trạng thái',
            'priority' => 'Độ ưu tiên',
        ];
    }
}
