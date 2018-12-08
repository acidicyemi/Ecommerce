<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            // 'id' => $this->id,
            'name' => $this->name,
            // 'description' => $this->detail,
            // 'price' => $this->price,
            // 'stock' => $this->stock == 0 ? ' Out of Stock' :$this->stock,
            'discount' => $this->discount,
            'totalPrice' => round(($this->price * (100 - $this->discount))/ 100, 2), 
            'rating' => $this->reviews->count() <= 0 ? 'No rating yet': round($this->reviews->sum('star') / $this->reviews->count()),
            'href' => [
                'productDetails' => route('products.show', $this->id)
                ]
            ];
    }
}
