<?php

namespace App\Actions\Fortify;

use Inertia\Inertia;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;

class Login
{
    public function __invoke(Request $request)
    {
        $email = $request->email;
        $pass = $request->password;

        $state = $request->validateWithBag('login', [
            'email' => ['required', 'max:50', 'email'],
            'password' => 'required|min:6',
        ]);

        if($state) {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect('/dashboard');
            }

            return back()->withErrors([
                'email' => 'Проверьте правильность данных.',
            ]);
        } else {
            return false;
        }
    }
}
