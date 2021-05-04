<?php

namespace App\Http\Resources\Specialty;

use Illuminate\Http\Resources\Json\JsonResource;

class SpecialtyResource extends JsonResource
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
            'specialtyId' => $this->id,
            'specialtyShortName' => $this->short_name,
            'specialtyAccreditationBody' => $this->accreditation_body,
            'specialtyCreatedAt' => $this->created_at,
            'specialtyUpdatedAt' => $this->updated_at,
            'specialtyDeletedAt' => $this->deleted_at,
        ];


    }
}
