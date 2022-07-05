<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
            'id' => ['required', 'max:5', 'min:5', Rule::unique('users'),
                        function ($attribute, $value, $fail) {
                            if (array_sum(str_split(substr($value, 0, 3))) != substr($value, 3, 2)) {
                                $fail('The '.$attribute.' is invalid.');
                            }
                        },
                    ],
            'name' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'id' => $input['id'],
            'name' => $input['name'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
