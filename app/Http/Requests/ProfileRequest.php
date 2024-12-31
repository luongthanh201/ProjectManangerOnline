<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'nullable|string|min:8|confirmed',
        ];
    }

    public function messages(): array
{
    return [
        'name.required' => 'Vui lòng nhập tên.',
        'email.required' => 'Vui lòng nhập email.',
        'email.email' => 'Email không hợp lệ.',
        'email.unique' => 'Email đã tồn tại.',
        'password.min' => 'Mật khẩu ít nhất 8 ký tự.',
        'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
    ];
}

}
