<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'name' => 'required|string|max:255', // Tiêu đề tài liệu là bắt buộc, kiểu chuỗi, tối đa 255 ký tự
            'file_path' => 'required|string|max:255', // Đường dẫn file là bắt buộc, kiểu chuỗi, tối đa 255 ký tự
            'type' => 'required|in:PDF,Word,Image,Excel,Presentation', // Loại tài liệu phải thuộc danh sách cho phép
            'user_id' => 'required|exists:users,id', // user_id phải tồn tại trong bảng users
            'project_id' => 'required|exists:projects,id', // project_id phải tồn tại trong bảng projects
            'uploaded_at' => 'required|date', // uploaded_at là bắt buộc và phải là kiểu ngày hợp lệ
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tiêu đề tài liệu là bắt buộc.',
            'file_path.required' => 'Đường dẫn tệp là bắt buộc.',
            'type.required' => 'Loại tài liệu là bắt buộc.',
            'type.in' => 'Loại tài liệu không hợp lệ. Chỉ chấp nhận: PDF, Word, Image, Excel, Presentation.',
            'user_id.required' => 'Người dùng được gán là bắt buộc.',
            'user_id.exists' => 'Người dùng không tồn tại.',
            'project_id.required' => 'Dự án được gán là bắt buộc.',
            'project_id.exists' => 'Dự án không tồn tại.',
            'uploaded_at.required' => 'Ngày tải lên là bắt buộc.',
            'uploaded_at.date' => 'Ngày tải lên phải là định dạng ngày hợp lệ.',
        ];
    }

}
