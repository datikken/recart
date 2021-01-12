<?php

namespace App\Http\Controllers;

use App\Repositories\AddressRepository;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    private $address;

    public function __construct(AddressRepository $address) {
        $this->address = $address;
    }

    public function index()
    {
        $allAdresses = $this->address->all();

        return $allAdresses;
    }

    public function get($id)
    {
        $addrById = $this->address->address($id);

        return $addrById;
    }

    public function lastAddress()
    {
        $lastAddr = $this->address->last();

        return $lastAddr;
    }

    public function set()
    {
        //TODO implement DTO pattern
    }
}
