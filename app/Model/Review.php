<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;

class Review extends Model
{
    protected $table = 'reviews';

    public function product()
    {
        return $this->belongsTo(Product::class, 'id', 'id');
    }
}
