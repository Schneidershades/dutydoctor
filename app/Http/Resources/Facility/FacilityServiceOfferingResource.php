<?php

namespace App\Http\Resources\Facility;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityServiceOfferingResource extends JsonResource
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
            'fsoId'             => $this->id,
            'fsoOfferName'      => $this->offer_name,
            'fsoDescription'    => $this->description,
            'fsoUnitOfMeasure'  => $this->unit_of_measure,
            'fsoDeliveryMode'   => $this->delivery_mode,
            'fsoImage'          => $this->profile_image,
            'fsoOfferUnitPrice' => $this->offer_unit_price,
            'fsoDefaultMarkupPrice'           => $this->default_price_markup_pct,
            'fsoFacilityId'       => $this->facility_id,
            'fsoServiceOfferingId'       => $this->service_offering_id,
            'fsoCreatedAt' => $this->created_at,
            'fsoUpdatedAt' => $this->updated_at,
            'fsoDeletedAt' => $this->deleted_at,
        ];
    }
}
