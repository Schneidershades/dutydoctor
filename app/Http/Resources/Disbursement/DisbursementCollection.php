<?php

namespace App\Http\Resources\Disbursement;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DisbursementCollection extends ResourceCollection
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
            'data' => DisbursementResource::collection($this->collection)
        ];
    }
}
