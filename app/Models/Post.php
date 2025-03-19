<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'image_path', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
