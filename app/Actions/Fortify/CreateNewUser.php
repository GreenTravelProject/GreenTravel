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
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'alpha', 'max:255'],
            'surname' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'birth_date' => ['required', 'date'],
            'phone' => ['required', 'numeric', 'digits:9'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'genre' => [Rule::in(['F','M','O']), 'required'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'surname' => $input['surname'],
            'birth_date' => $input['birth_date'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'genre' => $input['genre'],
        ]);
    }
}
