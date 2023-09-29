<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    public $countProduct;

    protected $fillable =
    [
        'id',
        'name',
        'price',
        'avatar',
        'discount',
        'product_code',
        'description',
        'detail',
        'cat_id',
        'status'
    ];

    function images()
    {
        return $this->hasMany('App\Models\Image');
    }


    public function category()
    {
        return $this->belongsTo(ChildCategory::class, 'cat_id');
    }

    public function ChildCategory()
    {
        return $this->belongsTo(ChildCategory::class, 'cat_id');
    }
}
