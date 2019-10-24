<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'min:10',
            'tag' => 'required',
            'url' => 'required',
            'img' => [
                'required',
                'image'
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio',
            'url.required' => 'El campo url es obligatorio',
            'img.required' => 'Debes seleccionar una imagen',
        ];
    }
}
