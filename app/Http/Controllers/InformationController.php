<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class InformationController extends Controller
{
    public function index()
    {
        $posts = DB::table('information_posts')
            ->orderBy('name')
            ->orderBy('user_face')
            ->get();


        $cur_name = null;
        $result = array();

        foreach ($posts as $obj) {
            if ($cur_name != $obj->name) {
                $newArr = array();
                array_push($result, $newArr);
                    $cur_name = $obj->name;
                }

                array_push($result[count($result) - 1], $obj);
        }

        return Inertia::render('Information/Information', [
            'information_posts' => $result
        ]);
    }

    public function sort_by_face($a, $b)
    {

    }
}
