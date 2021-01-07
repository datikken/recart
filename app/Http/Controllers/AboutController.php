<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutController extends Controller
{
    public function index()
    {
        return Inertia::render('About/About');
    }

    public function getAllYears()
    {
        $years = Year::all();
        $events = Year::with('Events')->get();

        return response()->json(array('years' => $years, 'events' => $events));
    }
}
