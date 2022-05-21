<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreDistrictRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'     => [
                'string',
                'required',
            ],
        ];
    }

    public function authorize()
    {
        // dd('checking');
        return Gate::allows('fo_access');
    }
}