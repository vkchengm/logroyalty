<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreRegionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'     => [
                'string',
                'required',
            ],
            'fo_id'     => [
                'integer',
            ],
            'ppw_id'     => [
                'integer',
            ],
            'tppw_id'     => [
                'integer',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('fo_access');
    }
}