<?php

namespace App\Http\Resources\Professional;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfessionalServiceAvailabilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        'psaId' => $this->id,
        'psaProfessionalId' => $this->facility_id,
        'psaServiceOfferingId' => $this->service_offering_id,
        'psaAvailableOnMonday' => $this->is_available_monday,
        'psaAvailableOnTuesday' => $this->is_available_tuesday,
        'psaAvailableOnWednesday' => $this->is_available_wednesday,
        'psaAvailableOnThursday' => $this->is_available_thursday,
        'psaAvailableOnFriday' => $this->is_available_friday,
        'psaAvailableOnSaturday' => $this->is_available_saturday,
        'psaAvailableOnSunday' => $this->is_available_sunday,
        'psaOpenTime' => $this->specific_time_open,
        'psaCloseTime' => $this->specific_time_close,
        'psaCurrentlyAvailable' => $this->is_currently_unavailable,
        'psaCreatedAt' => $this->created_at,
        'psaUpdatedAt' => $this->updated_at,
        'psaDeletedAt' => $this->deleted_at,
    }
}
