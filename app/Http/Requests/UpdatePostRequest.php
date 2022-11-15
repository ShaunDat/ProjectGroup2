<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
                Rule::unique('posts','title')->ignore($this->post),
            ],
            'detail'=>'required',
            'metakey'=>'required',
            'metadesc'=>'required',
            'metadesc'=>'required',
            'topid' => 'required',
        ];
    }
    public function messages(){
        return[

            'title.required' => 'list zero',
            'title.unique' => 'list zero',
            'title.name' => 'list zero',
            'metakey.required' => 'list zero',
            'metadesc.required' => 'list zero',
            'detail'=>'required',
            'topid' => 'required',
            'img.mimes' => 'image does not exist',
            'img.mimes' => 'the image is out of size, max size 2048',


        ];
    }
}
