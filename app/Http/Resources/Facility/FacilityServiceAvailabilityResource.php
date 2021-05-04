<?php

namespace App\Http\Resources\Facility;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityServiceAvailabilityResource extends JsonResource
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
            'fsaId' => $this->id,
            'fsaFacilityId' => $this->facility_id,
            'fsaFacilityLocationId' => $this->facility_location_id,
            'fsaServiceOffering' => $this->service_offering_id,
            'fsaAvailableOnMonday' => $this->is_available_monday,
            'fsaAvailableOnTuesday' => $this->is_available_tuesday,
            'fsaAvailableOnWednesday' => $this->is_available_wednesday,
            'fsaAvailableOnThursday' => $this->is_available_thursday,
            'fsaAvailableOnFriday' => $this->is_available_friday,
            'fsaAvailableOnSaturday' => $this->is_available_saturday,
            'fsaAvailableOnSunday' => $this->is_available_sunday,
            'fsaOpenTime' => $this->specific_time_open,
            'fsaCloseTime' => $this->specific_time_close,
            'fsaCurrentlyAvailable' => $this->is_currently_unavailable,
            'fsaCreatedAt' => $this->created_at,
            'fsaUpdatedAt' => $this->updated_at,
            'fsaDeletedAt' => $this->deleted_at,
        ];
    }
}
