<?php

namespace App\Http\Resources\Professional;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfessionalResource extends JsonResource
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
            'professionalId' => $this->id,
            'professionalPublicCode' => $this->public_code,
            'professionalAccountBalance' => $this->account_balance,
            'professionalDefaultMarkupPrice' => $this->default_price_markup_pct,
            'professionalCreatedAt' => $this->created_at,
            'professionalUpdatedAt' => $this->updated_at,
            'professionalDeletedAt' => $this->deleted_at,
        ];
    }
}
