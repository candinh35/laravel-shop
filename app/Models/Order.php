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
        $key = request()->input('search');
        return $query->orWhere('name', 'like', '%'.$key.'%')->orWhere('email', 'like', '%'.$key.'%');
    }

    public function orderDetails()
    {
        return $this->hasMany(Order_detail::class, 'order_id', 'id');
    }
}
