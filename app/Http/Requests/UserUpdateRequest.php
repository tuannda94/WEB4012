<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // điều kiện để phân quyền cho việc gửi yêu cầu
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:50',
            'email' => 'required|email'
        ];
    }

    // Hàm định nghĩa các message lỗi của rules()
    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng bắt buộc nhập',
            'name.min' => 'Độ dài tên người dùng tối thiểu 6 ký tự',
            'name.max' => 'Độ dài tên người dùng tối đa 50 ký tự',
            'email.required' => 'Email người dùng bắt buộc nhập',
            'email.email' => 'Email người dùng phải đúng định dạng'
        ];
    }
}
