<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'title',
        'path_image',
        'content',
        'status'
    ];

    public function scopeSearch($query)
    {
        $key = request()->input('search');
        return $query->where('title', 'like', '%'.$key.'%');
    }

    public  function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Blog_comment::class, 'blog_id', 'id');
    }
}
