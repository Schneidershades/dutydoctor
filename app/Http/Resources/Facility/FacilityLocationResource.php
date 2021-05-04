<?php

namespace App\Http\Resources\Facility;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityLocationResource extends JsonResource
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
            'locationId' => $this->id,
            'locationFacilityId' => $this->facility_id,
            'locationName' => $this->location_name,
            'locationHouseNo' => $this->location_address_house_number,
            'locationStreet' => $this->location_address_street_name,
            'locationSuburb' => $this->location_address_suburb,
            'locationCity' => $this->location_address_city,
            'locationState' => $this->location_address_state,
            'locationLocation' => $this->gps_location_name,
            'locationLong'           => $this->gps_long,
            'locationLat'       => $this->gps_lat,
            'locationGpsCity'       => $this->gps_city,
            'locationGpsState'       => $this->gps_state,
            'locationCreatedAt' => $this->created_at,
            'locationUpdatedAt' => $this->updated_at,
            'locationDeletedAt' => $this->deleted_at,
        ]; 
    }
}
