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
            'content' => 'required|min:10|max:191',
            'status' => 'required|in:pending,resolved,in-progress',
            'priority' => 'required|in:High,Medium,Low',
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages()
    {
        return [
            'content.required' => 'Nội dung không được để trống.',
            'content.min' => 'Nội dung phải có ít nhất :min ký tự.',
            'content.max' => 'Nội dung không được vượt quá :max ký tự.',
            'status.required' => 'Trạng thái không được để trống.',
            'status.in' => 'Trạng thái không hợp lệ. Chỉ được chọn pending, resolved, hoặc in-progress.',
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
