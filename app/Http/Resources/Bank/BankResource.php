<?php

namespace App\Http\Resources\Bank;

use Illuminate\Http\Resources\Json\JsonResource;

class BankResource extends JsonResource
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
            'bankId' => $this->id,
            'bankValue' => $this->value,
            'bankKey' => $this->key,
            'bankRoutingNumber' => $this->routing_number,
            'bankCode' => $this->paystack_bank_code,
            'bankDetails' => $this->paystack_bank_details,
            'bankCreatedAt' => $this->created_at,
            'bankUpdatedAt' => $this->updated_at,
            'bankDeletedAt' => $this->deleted_at,
        ];
    }
}
