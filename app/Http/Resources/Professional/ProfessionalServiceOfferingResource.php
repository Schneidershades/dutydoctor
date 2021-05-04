<?php

namespace App\Http\Resources\Professional;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfessionalServiceOfferingResource extends JsonResource
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
            'psoOfferUnitPrice' => $this->offer_unit_price,
            'psoDefaultMarkupPrice'           => $this->default_price_markup_pct,
            'psoProfessionalId'       => $this->professional_id,
            'psoServiceOfferingId'       => $this->service_offering_id,
            'psoCreatedAt' => $this->created_at,
            'psoUpdatedAt' => $this->updated_at,
            'psoDeletedAt' => $this->deleted_at,
        ];
    }
}
