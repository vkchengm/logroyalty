<?php

namespace App\Http\Requests;

use App\Models\License;
use App\Models\Licensee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreLicenseRequest extends FormRequest
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
            'name'        => [
                'string',
                'required',
            ],
            'type'        => [
                'string',
                'required',
            ],
            'start_date'  => [
                'date',
            ],
            'expiry_date' => [
                'date',
            ],
        ];
    }

    public function persist(Licensee $licensee)
    {
        return $licensee->licenses()->create($this->validated());
    }
}
