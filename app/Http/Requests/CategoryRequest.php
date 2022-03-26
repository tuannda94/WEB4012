<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:6|max:32',
            'description' => 'min:6',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên bắt buộc nhập',
            'name.min' => 'Tên từ 6 ký tự trở lên',
            'name.max' => 'Tên tối đa 32 ký tự',
            'description.min' => 'Mô tả tối thiểu 6 ký tự',
            'status.required' => 'Trạng thái là bắt buộc chọn'
        ];
    }
}
