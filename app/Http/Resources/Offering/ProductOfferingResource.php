<?php

namespace App\Http\Resources\Offering;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductOfferingResource extends JsonResource
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
            'poId'             => $this->id,
            'poProductName'      => $this->product_name,
            'poBrandName'    => $this->brand_name,
            'poManufacturer'  => $this->manufacturer,
            'poUpcCode'   => $this->upc_code,
            'poDescription' => $this->description,
            'poUnitOfMeasure' => $this->unit_of_measure,
            'poIsDrug' => $this->is_drug,
            'poHasSaleRestrictions' => $this->has_sale_restrictions,
            'poImage'          => $this->profile_image,
            'poDefaultMarkupPrice'           => $this->default_price_markup_pct,
            'poCreatedAt' => $this->created_at,
            'poUpdatedAt' => $this->updated_at,
            'poDeletedAt' => $this->deleted_at,
        ];
    }
}
