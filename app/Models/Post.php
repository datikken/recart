<?php

namespace App\Models;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use HasFactory;
    use HasTags;

    protected $guarded = [];

    protected $fillable = [
        'category',
        'heading',
        'description',
        'user_id',
        'content',
        'created_at',
        'updated_at',
        'shares',
        'likes',
        'dislikes',
        'comments'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function url()
    {
        $id = $this->id;
        URL::to('/blog/' . $id);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}

