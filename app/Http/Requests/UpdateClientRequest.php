<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_edit');
    }

    public function rules()
    {
        return [
            'company_name'    => [
                'string',
                'required',
            ],
            'email'           => [
                'nullable',
            ],
            'phone'           => [
                'string',
                'nullable',
            ],
            'adresa_ulica'    => [
                'string',
                'nullable',
            ],
            'adresa_cislo'    => [
                'string',
                'nullable',
            ],
            'adresa_mesto'    => [
                'string',
                'nullable',
            ],
            'adresa_psc'      => [
                'string',
                'nullable',
            ],
            'kontaktna_osoba' => [
                'string',
                'nullable',
            ],
            'osoba_phone'     => [
                'string',
                'nullable',
            ],
            'poznamka'        => [
                'string',
                'nullable',
            ],
            'ico'             => [
                'string',
                'nullable',
            ],
            'ic_dph'          => [
                'string',
                'nullable',
            ],
            'dic'             => [
                'string',
                'nullable',
            ],
            'banka'           => [
                'string',
                'nullable',
            ],
            'ucet'            => [
                'string',
                'nullable',
            ],
        ];
    }
}
