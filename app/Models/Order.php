<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'status',
        'phone',
        'payment_name',
    ];

    public function scopeSearch($query)
    {
        if (request()->has('search')){
            $key = request()->input('search');
            return $query->where('name', '%'.$key.'%')->orWhere('email','%'.$key.'%');
        }
    }

    public function orderDetails()
    {
        return $this->hasMany(Order_detail::class, 'order_id', 'id');
    }
}
