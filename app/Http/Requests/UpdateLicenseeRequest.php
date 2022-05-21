<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateLicenseeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('admin_access');
        // return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'     => [
                'string',
                'required',
            ],
            'type'     => [
                'string',
                'required',
            ],
            // 'license_type'    => [
            //     'string',
            //     'nullable',
            // ],            
            // 'license_no'    => [
            //     'string',
            //     'nullable',
            // ],            
            // 'licensee_ac_no'    => [
            //     'string',
            //     'nullable',
            // ],            
            'contact_no'    => [
                'string',
                'nullable',
            ],            
        ];
    }
}
