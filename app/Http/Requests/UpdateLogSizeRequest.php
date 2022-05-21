<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateLogSizeRequest extends FormRequest
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
            'name'    => [
                'string',
                'required',
            ],            
            'fr_size'    => [
                'integer',
                'required',
            ],            
            'to_size'    => [
                'integer',
                'required',
            ],            
            'unit'    => [
                'string',
                'required',
            ],            
        ];
    }
}
