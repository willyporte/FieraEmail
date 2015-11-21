<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ParametriRequest extends Request
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
            'omaggi_ogni' => 'required|numeric|min:1|max:1000',
            'gadget_ogni' => 'required|numeric|min:1|max:1000',
            'time'        => 'required|numeric|min:5|max:200',
        ];
    }
    public function messages()
    {
        return [
            'omaggi_ogni.required' => 'omaggi_ogni è un campo obbligatorio',
            'omaggi_ogni.min' => 'omaggi_ogni almeno deve essere 1',
            'omaggi_ogni.numeric' => "omaggi_ogni dev'essere un valore numerico",
            'omaggi_ogni.max' => 'il massimo per omaggi_ogni è il valore 1000',

            'gadget_ogni.required' => 'gadget_ogni è un campo obbligatorio',
            'gadget_ogni.min' => 'gadget_ogni almeno deve essere 1',
            'gadget_ogni.numeric' => "gadget_ogni dev'essere un valore numerico",
            'gadget_ogni.max' => 'il massimo per gadget_ogni è il valore 1000',

            'time.required' => 'time è un campo obbligatorio',
            'time.min' => 'time almeno deve essere 5 secondi',
            'time.numeric' => "time dev'essere un valore numerico",
            'time.max' => 'il massimo tempo è di 200 secondi',
        ];
    }
}
