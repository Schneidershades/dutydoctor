<?php

namespace App\Http\Resources\Facility;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityProductOfferingResource extends JsonResource
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
            'fpoId'             => $this->id,
            'fpoProductName'      => $this->product_name,
            'fpoBrandName'    => $this->brand_name,
            'fpoManufacturer'  => $this->manufacturer,
            'fpoUpcCode'   => $this->upc_code,
            'fpoQuantityAvailable'          => $this->qty_available,
            'fpoProductAvailablityDate' => $this->product_availability_date,
            'fpoDescription' => $this->description,
            'fpoUnitOfMeasure' => $this->unit_of_measure,
            'fpoIsDrug' => $this->is_drug,
            'fpoHasSaleRestrictions' => $this->has_sale_restrictions,
            'fpoImage'          => $this->profile_image,
            'fpoOfferUnitPrice'           => $this->offer_unit_price,
            'fpoDefaultMarkupPrice'           => $this->default_price_markup_pct,
            'fpoProductOfferingId'           => $this->product_offering_id,
            'fpoFacilityId'           => $this->facility_id,
            'fpoCreatedAt' => $this->created_at,
            'fpoUpdatedAt' => $this->updated_at,
            'fpoDeletedAt' => $this->deleted_at,
        ];
    }
}
