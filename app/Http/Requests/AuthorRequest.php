<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'tentacgia'=>'required|unique:tacgia',

        ];
    }

    public function messages()
    {
        return[
            'tentacgia.required'=>'Vui Lòng Nhập Tên Tác Giả',
            'tentacgia.unique'=>'Tên Tác Giả Đã Tồn Tại',

        ];
    }
}
