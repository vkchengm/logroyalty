<?php

namespace App\Http\Requests;

use App\Models\LandTypes;
use App\Models\License;
use App\Models\LicenseAccCoupe;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class CreateAccountCoupeRequest extends FormRequest
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
            'account_no'  => ['required', 'string', 'min:3', 'max:255'],
            'coupe_no'    => ['required', 'string', 'min:3', 'max:255'],
            'issued_date' => ['date'],
            'start_date'  => ['date'],
            'expiry_date' => ['date'],
            'land_type'   => ['numeric', Rule::in(LandTypes::query()->pluck('id')->toArray())],
        ];
    }

    public function persist(License $license)
    {
        return $license->licenseAccCoupes()->create($this->validated());
    }
}
