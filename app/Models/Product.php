<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'price',
        'sale_price',
        'path_image',
        'amount',
        'content',
        'description',
        'category_id',
        'brand_id',
    ];

    public function scopeSearch($query)
    {

        $key = request()->input('search');
        return $query->where('name', 'like', '%'.$key.'%');
    }
    public function productColors()
    {
        return $this->belongsToMany(Color::class , 'product_colors', 'product_id', 'color_id');
    }

    public function productSizes()
    {
        return $this->belongsToMany(Size::class , 'product_sizes', 'product_id', 'size_id');
    }
    public function categories(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Category::class , 'id', 'category_id');
    }
    public function brands(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Brand::class , 'id', 'brand_id');
    }

    public function productImages()
    {
        return $this->hasMany(Product_image::class, 'product_id', 'id');
    }
    public function productComments()
    {
        return $this->hasMany(Product_comment::class, 'product_id', 'id');
    }
}
