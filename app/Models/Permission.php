<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent_id',
        'key_code'
    ];

    public  function getPermissionChild(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Permission::class, 'parent_id');
    }

    public function scopeSearch($query)
    {
        if (request()->has('getPermission')){
            $key = request()->input('getPermission');
            return $query->where('name','%' .$key. '%');
        }

    }
}
