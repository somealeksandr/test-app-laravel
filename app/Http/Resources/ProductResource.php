<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_id' => $this->id,
            'name' => $this->name,
            'order_id' => $this->pivot->order_id ?? null,
            'orders' => $this->orders->count() ?? 0,
            'price' => $this->price,
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
