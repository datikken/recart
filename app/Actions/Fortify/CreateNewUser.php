<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
//        $name = $request->name;
//        $email = $request->email;
//        $pass = $request->password;
//        $type = $request->type;



        Validator::make($input, [
            'name' => 'required',
            'email' => ['required', 'max:50', 'email', Rule::unique('users')],
            'password' => $this->passwordRules(),
            'password_confirmation' => 'required|min:6',
            'policy_confirm' => 'accepted'
        ])->validate();

//        $request->validateWithBag('createNewUser', [
//
//        ]);

        return User::create([
//            'name' => $name,
//            'email' => $email,
//            'password' => Hash::make($pass),
//            'face' => $type
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
