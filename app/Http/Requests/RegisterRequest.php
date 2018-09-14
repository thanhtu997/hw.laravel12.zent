<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed',
        ];
    }
    public function messages(){
        return [
            'required'  =>  ':attribute không được để trống',
            'min'   =>  ':attribute không được nhỏ hơn :min',
            'email' => ':attribute không đúng',
            'unique'   =>   ':attribute không được trùng',

        ];
    }
}
