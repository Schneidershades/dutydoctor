<?php

namespace App\Http\Resources\Facility;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityUserResource extends JsonResource
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
            'fuId' => $this->id,
            'fuPublicCode' => $this->public_code,
            'fuFacilityId' => $this->facility_id,
        ]; 
    }
}
