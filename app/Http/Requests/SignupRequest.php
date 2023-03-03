<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
           
            'Name' => 'required|max:75',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation',
            'mobile_no' => 'required|regex:/[0-9]{9}/',
            // 'mobile_no' => 'required',
            'role' => 'required'
        ];
    }
}
