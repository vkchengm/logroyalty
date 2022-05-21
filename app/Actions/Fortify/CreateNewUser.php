<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_no' => ['required', 'string', 'max:255'],
            'ic' => ['required', 'string', 'max:255'],
            'job_title' => ['required', 'string', 'max:255'],
            // 'status' => ['required', 'string', 'max:255'],
            // 'type' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'mobile_no' => $input['mobile_no'],
            'ic' => $input['ic'],
            'job_title' => $input['job_title'],
            'status' => 'active',
            'type' => 'external',
            'password' => Hash::make($input['password']),
        ]);
        
    }
}
