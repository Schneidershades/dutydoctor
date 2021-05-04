<?php

namespace App\Http\Resources\PayAttempt;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PayAttemptCollection extends ResourceCollection
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
            'data' => PayAttemptResource::collection($this->collection)
        ];
    }
}
