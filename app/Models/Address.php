<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'city',
        'street',
        'home',
        'wing',
        'building',
        'porch',
        'intercom',
        'floor',
        'flat',
        'comment',
        'created_at',
        'updated_at'
    ];
}
