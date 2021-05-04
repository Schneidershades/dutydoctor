<?php

namespace App\Http\Resources\Specialty;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SpecialtyCollection extends ResourceCollection
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
            'data' => SpecialtyResource::collection($this->collection)
        ];
    }
}
