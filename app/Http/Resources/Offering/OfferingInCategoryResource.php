<?php

namespace App\Http\Resources\Offering;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferingInCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'oicId' => $this->id,
            'oicCategoryId' => $this->category_id,
            'oicServiceOfferingId' => $this->service_offering_id,
            'oicProductOfferingId' => $this->product_offering_id,
        ];
    }
}
