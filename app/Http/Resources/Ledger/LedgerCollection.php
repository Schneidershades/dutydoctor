<?php

namespace App\Http\Resources\Ledger;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LedgerCollection extends ResourceCollection
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
            'data' => LedgerResource::collection($this->collection)
        ];
    }
}
