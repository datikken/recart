<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon_path',
        'name',
        'heading',
        'description',
        'user_face',
        'created_at',
        'updated_at'
    ];
}
