<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotifyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:191',
            'content' => 'required|min:10|max:191',
            'status' => 'required|in:received,not-received'
        ];
    }

    public function messages()
    {
        return [

            'content.required' => 'Nội dung không được để trống.',
            'content.min' => 'Nội dung phải có ít nhất :min ký tự.',
            'content.max' => 'Nội dung không được vượt quá :max ký tự.',
            'status.required' => 'Trạng thái không được để trống.',
            'status.in' => 'Trạng thái không hợp lệ. Chỉ được chọn received, not-received.',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên thông báo',
            'content' => 'Mô tả',
            'status' => 'Trạng thái',
        ];
    }
}
