<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Laravel\Jetstream\Jetstream;
use Stevebauman\Location\Facades\Location;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
    }
    public function getUserAddress(Request $request)
    {
        $ip = $request->ip();
        $position = Location::get($ip);

        return response()->json($position);
    }

    public function setName(Request $request)
    {
        $name = $request->name;
        $statusText = Config::get('responses.success.setName');

        return $this->store($name,'name', $statusText);
    }

    public function setLastName(Request $request)
    {
        $lastname = $request->last_name;
        $statusText = Config::get('responses.success.setLastName');

        return $this->store($lastname,'last_name', $statusText);
    }

    public function setTel(Request $request)
    {
        $tel = $request->tel;
        $statusText = Config::get('responses.success.setTel');

        return $this->store($tel,'tel', $statusText);
    }

    public function store($val, $col, $statusText)
    {
        $id = Auth::id();
        DB::table('users')->where('id', $id)->update(array($col => $val));

        $response = [
            'status' => 200,
            'message' => $statusText,
        ];

        return response()->json($response);
    }

    public function exportUsersExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function setProfilePhoto(Request $request)
    {
        $file = $request->get('file');

        $usr = Auth::user();
        $status = $usr->updateProfilePhoto($file);

        return response()->json($status);
    }
}
