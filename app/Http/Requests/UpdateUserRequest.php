<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('users','name')->ignore($this->user),
            ],
            'email'    => 'required|email',
            'password' => [
                'required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                'confirmed'
            ]
        ];
    }
    public function messages(){
        return[

            'name.required' => 'list zero',
            'name.unique' => 'list zero',
            'name.name' => 'list zero',
            'name.required' => 'list zero',
            'name.unique' => 'list zero',
            'name.name' => 'list zero',
            'email.name' => 'list email',
            'password.required' => 'list zero',
            'password.min' => 'Input <6',
            'password.regex' => 'Input error',
            'password.confirmed' => 'list zero',

        ];
    }
}
