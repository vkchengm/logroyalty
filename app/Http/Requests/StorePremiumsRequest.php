<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePremiumsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('fo_access');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'land_type_id'     => [
                'integer',
                'required',
            ],
            'log_size_id'     => [
                'integer',
                'required',
            ],
            'licensee_type'     => [
                'string',
                'required',
            ],
            'amount'     => [
                // 'decimal',
                'required',
            ],
        ];
    }
}
