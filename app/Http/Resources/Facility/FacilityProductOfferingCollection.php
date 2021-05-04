<?php

namespace App\Http\Resources\Facility;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FacilityProductOfferingCollection extends ResourceCollection
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
            'data' => FacilityProductOfferingResource::collection($this->collection)
        ];
    }
}
