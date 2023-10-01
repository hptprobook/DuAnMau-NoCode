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

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function relatedAttributes()
    {
        return $this->hasManyThrough(
            Attribute::class,    // Model của bảng thuộc tính
            AttributeValue::class,  // Model của bảng giá trị thuộc tính
            'product_id',         // Khóa ngoại trong bảng giá trị thuộc tính
            'id',                 // Khóa chính trong bảng sản phẩm
            'id',                 // Khóa chính trong bảng thuộc tính
            'attribute_id'        // Khóa ngoại trong bảng thuộc tính
        );
    }
}
