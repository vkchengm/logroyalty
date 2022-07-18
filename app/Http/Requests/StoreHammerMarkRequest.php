<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreHammerMarkRequest extends FormRequest
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
            'type'     => [
                'string',
                'required',
            ],
            'number'     => [
                'string',
                'required',
            ],
            'employee_id'     => [
                'string',
            ],
            'employee_name'     => [
                'string',
                'required',
            ],
            'ic'     => [
                'string',
                'required',
            ],
            'old_ic'     => [
                'string',
                'required',
            ],
            'position'     => [
                'string',
            ],
            'district_id'     => [
                'integer',
            ],
            
        ];
    }
}
