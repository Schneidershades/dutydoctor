<?php

namespace App\Http\Resources\Facility;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FacilityProfessionalCollection extends ResourceCollection
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
            'data' => FacilityProfessionalResource::collection($this->collection)
        ];
    }
}
