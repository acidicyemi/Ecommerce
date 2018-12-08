<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->detail,
            'price' => $this->price,
            'stock' => $this->stock == 0 ? ' Out of Stock' :$this->stock,
            'discount' => $this->discount,
            'totalPrice' => round(($this->price * (100 - $this->discount))/ 100, 2), 
            'rating' => $this->reviews->count() <= 0 ? 'No rating yet': round($this->reviews->sum('star') / $this->reviews->count()),
            'href' => [
                'reviews' => route('reviews.index', $this->id)
            ]
        ];
    }
}
