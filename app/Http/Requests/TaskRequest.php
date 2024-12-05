<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'id_user' => 'required|exists:users,id',
            'deadline' => 'required|date|after:today',
            'status' => 'required|in:in-progress,pending,completed',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên nhiệm vụ là bắt buộc.',
            'id_user.required' => 'Bạn phải chỉ định một thành viên.',
            'id_user.exists' => 'Thành viên được chỉ định không tồn tại.',
            'deadline.required' => 'Hạn chót là bắt buộc.',
            'deadline.after' => 'Hạn chót phải sau ngày hôm nay.',
            'status.required' => 'Trạng thái nhiệm vụ là bắt buộc.',
            'status.in' => 'Trạng thái không hợp lệ. Chỉ chấp nhận: in-progress, pending, completed.',
        ];
    }
}
