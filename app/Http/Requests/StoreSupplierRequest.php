<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
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

            'name' => 'required|unique:suppliers',
            'siteurl' => 'required',
            'logo' => 'mimes:jpg,bmp,png,gif|max:2048',
            'fullname' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'metakey' => 'required',
            'metadesc' => 'required',
    
    ];
    }
    public function messages(){
        return[

            'name.required' => 'list zero',
            'name.unique' => 'list zero',
            'name.name' => 'list zero',
            'metakey.required' => 'list zero',
            'metadesc.required' => 'list zero',

        ];
    }
}
