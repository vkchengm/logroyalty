<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'    => [
                'string',
                'required',
            ],
            'email'   => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'licensee_id'    => [
                'integer',
                'nullable',
            ],
            // 'password' => [
            //     'required',
                
            // ],
            'roles.*' => [
                'integer',
            ],
            'roles'   => [
                // 'required',
                'array',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('admin_access');
    }
}