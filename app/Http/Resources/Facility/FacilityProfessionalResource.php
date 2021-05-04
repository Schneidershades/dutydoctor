<?php

namespace App\Http\Resources\Facility;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityProfessionalResource extends JsonResource
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
            'fpId' => $this->id,
            'fpFacilityId' => $this->facility_id,
            'fpProfessionalId' => $this->professional_id,
            'fpIsAcceptedFacility' => $this->is_accepted_facility,
            'fpIsAcceptedProfessional' => $this->is_accepted_professional,
            'fpCreatedAt' => $this->created_at,
            'fpUpdatedAt' => $this->updated_at,
            'fpDeletedAt' => $this->deleted_at,
        ];
    }
}
