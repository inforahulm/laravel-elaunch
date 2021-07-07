<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserApiLoginRequest extends FormRequest
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
            'auth-type'=> 'required|in:facebook,google,others' ,
            'facebook_id'=>'required_if:auth-type,==,facebook',
            'google_id'=>'required_if:auth-type,==,google',
            'email'=>'required_if:auth-type,==,others',
            'password'=>'required_if:auth-type,==,others'
        ];
    }      
}
