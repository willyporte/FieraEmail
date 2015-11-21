<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TicketRequest extends Request
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
            'email' => 'email|required|unique:tickets',
            'name' => 'required',
            'city' => 'required',
            'privacy' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email già esistente!',
            'email.required' => 'Eiii, hai dimenticato il tuo email',
            'email.email' => 'Controlla il tuo email',
            'name.required' => 'Inserisci il tuo nome',
            'city.required' => 'Ci serve sapere la tua città',
            'privacy.required' => 'NO, NO ... senza il tuo consenso al trattamento dei dati non possiamo continuare',
        ];
    }
}
