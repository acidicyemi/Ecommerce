<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'detail', 'price', 'discount', 'stock'];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
}
