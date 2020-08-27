<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidation extends FormRequest
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
            'name'=>'required|max:50',
            'email'=>'required|max:50|unique:library',
            'password'=>'required|confirmed|max:20|',
            'image' => 'required'
        ];
    }


    //customize validation message 
    public function message()
    {
        return [
            'name.required'=>'Please Enter Your Name',
            'name.max'=>'Name is Too Long',
            'email.required'=>'Please Enter Your Email',
            'email.max'=>'Email Address is too Long',
            'email.unique'=>'This Email is already Registered',
        ];
    }
}
