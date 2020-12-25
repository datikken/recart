<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class InformationController extends Controller
{
    protected $result;

    public function __construct()
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

        $this->result = $result;
    }

    public function index()
    {
        return Inertia::render('Information/Information');
    }

    public function get_all_posts()
    {
        $res = $this->result;

        return response()->json($res);
    }
}
