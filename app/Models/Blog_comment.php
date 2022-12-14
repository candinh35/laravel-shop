<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'blog_id',
        'user_id',
        'message',
    ];

    public function blog()
    {
        return $this->hasOne(Blog::class, 'id', 'blog_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
