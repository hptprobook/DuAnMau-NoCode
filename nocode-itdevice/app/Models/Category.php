<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Category extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    public $countCategory;

    protected $table = 'categories';

    protected $fillable = [
        'id',
        'name',
        'main_cat_id'
    ];

    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class, 'main_cat_id');
    }

    public function childCategories()
    {
        return $this->hasMany(ChildCategory::class, 'cat_id');
    }
}
