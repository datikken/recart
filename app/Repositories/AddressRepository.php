<?php


namespace App\Repositories;


use App\Models\Address;
use App\Models\User;

class AddressRepository
{
    public function all()
    {
        return Address::all();
    }
    public function address($id)
    {
        return Address::where($id);
    }
    public function getByUser(User $user)
    {
        return Address::where('user_id'. $user->id)->get();
    }
}
