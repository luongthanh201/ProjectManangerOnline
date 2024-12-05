<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            'name' => 'required|string|max:255', // Tên báo cáo bắt buộc
            'file_path' => 'required|file|mimes:pdf,doc,docx|max:2048', // File bắt buộc, định dạng PDF/Word, tối đa 2MB
            'user_id' => 'nullable|exists:users,id', // Người dùng (nếu có) phải tồn tại trong bảng users
            'created_date' => 'required|date', // Ngày tạo phải đúng định dạng ngày
            'status' => 'required|in:approved,pending,rejected', // Trạng thái phải nằm trong các giá trị cho phép
        ];

    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên báo cáo là bắt buộc.',
            'file_path.required' => 'Bạn phải tải lên tệp báo cáo.',
            'file_path.file' => 'Đường dẫn tải lên phải là một tệp hợp lệ.',
            'file_path.mimes' => 'Tệp báo cáo phải có định dạng: pdf, doc, docx.',
            'user_id.required' => 'Bạn phải chỉ định người tạo báo cáo.',
            'user_id.exists' => 'Người tạo được chỉ định không tồn tại.',
            'created_date.required' => 'Ngày tạo báo cáo là bắt buộc.',
            'created_date.before_or_equal' => 'Ngày tạo báo cáo không được lớn hơn ngày hiện tại.',
            'status.required' => 'Trạng thái báo cáo là bắt buộc.',
            'status.in' => 'Trạng thái không hợp lệ. Chỉ chấp nhận: approved, pending, rejected.',
        ];
    }

}
