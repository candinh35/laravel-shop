<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Background extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'path_image',
        'status'
    ];

    public function scopeSearch($query)
    {
        $key = request()->input('search');
        return $query->where('name', 'like', '%'.$key.'%');
    }
}
