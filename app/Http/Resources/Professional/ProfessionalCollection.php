<?php

namespace App\Http\Resources\Professional;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProfessionalCollection extends ResourceCollection
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
            'data' => ProfessionalResource::collection($this->collection)
        ];
    }
}
