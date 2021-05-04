<?php

namespace App\Http\Resources\Offering;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductOfferingCollection extends ResourceCollection
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
            'data' => ProductOfferingResource::collection($this->collection)
        ];
    }
}
