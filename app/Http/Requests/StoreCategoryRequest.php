<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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

            'name' => 'required|unique:categorys|min:2',
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
