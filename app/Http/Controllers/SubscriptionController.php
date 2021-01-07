<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $email = $request->email;

        Validator::make([$email], [
            'email' => ['email', 'string']
        ]);

        Subscription::updateOrCreate(['email' => $email]);

        return response()->json(['status'=>200, 'subscriber' => $email]);
    }
}
