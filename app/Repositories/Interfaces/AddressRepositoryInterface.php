<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface AddressRepositoryInterface
{
   public function all();
   public function getByUser(User $user);
}
