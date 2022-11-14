<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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

            'name' => 'required|unique:products',
            'detail' => 'required',
            'catid' => 'required',
            'suppid' => 'required',
            'img' => 'mimes:jpg,bmp,png,gif|max:2048',
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
            'catid' => 'required',
            'suppid.required' => 'list zero',
            'img.mimes' => 'image does not exist',
            'img.mimes' => 'the image is out of size, max size 2048',

        ];
    }
}
