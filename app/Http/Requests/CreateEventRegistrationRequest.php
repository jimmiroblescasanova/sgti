<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateEventRegistrationRequest extends FormRequest
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
            'nombre' => 'required',
            'apellidos' => 'required',
            'empresa' => 'required',
            'telefono' => 'required|digits:10',
            'event_id' => 'exists:events,id',
            'correo' => [
                'required',
                Rule::unique('event_registrations', 'correo')->where(function ($query) {
                    return $query->where('event_id', '=', $this->input('event_id'));
                })],
        ];
    }
}
