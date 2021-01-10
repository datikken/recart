<?php

namespace App\Actions\Fortify;

use Inertia\Inertia;

class Redirect
{
    public static function route($url)
    {
        return Inertia::render($url);
    }
}
