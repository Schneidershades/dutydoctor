<?php

namespace App\Http\Resources\Offering;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceOfferingResource extends JsonResource
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
            'psoId'             => $this->id,
            'psoOfferName'      => $this->offer_name,
            'psoDescription'    => $this->description,
            'psoUnitOfMeasure'  => $this->unit_of_measure,
            'psoDeliveryMode'   => $this->delivery_mode,
            'psoImage'          => $this->profile_image,
            'psoDefaultMarkupPrice'           => $this->default_price_markup_pct,
            'psoSpecialtyId'       => $this->specialty_id,
            'psoCreatedAt' => $this->created_at,
            'psoUpdatedAt' => $this->updated_at,
            'psoDeletedAt' => $this->deleted_at,
        ];
    }
}
