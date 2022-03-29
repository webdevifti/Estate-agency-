<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
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
            'fullname' => 'required',
            'agent_email' => 'required|unique:agents',
            'password' => 'required|min:6|max:20',
            'confirm_password' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'fullname.required' => 'Please give your fullname',
            'email.required' => 'Please give your email address',
            'password.required' => 'Password is required',
            'confirm_password.required' => 'Confirm password is required',
        ];
    }
}
