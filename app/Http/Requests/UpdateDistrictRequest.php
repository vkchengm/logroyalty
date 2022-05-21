<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateDistrictRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'    => [
                'string',
                'required',
            ],
            'dfo_id'     => [
                'integer',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('fo_access');
    }
}