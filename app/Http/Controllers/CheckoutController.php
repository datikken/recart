<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function get()
    {
        return Inertia::render('Checkout/Checkout');
    }

    public function checkoutDelivery()
    {
        return Inertia::render('Checkout/CheckoutDelivery');
    }
}
