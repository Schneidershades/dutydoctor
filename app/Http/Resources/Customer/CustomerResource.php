<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'customerId' => $this->id,
            'customerPublicCode' => $this->public_code,
            'customerBirthDate' => $this->birth_date,
            'customerAccountBalance' => $this->account_balance,
            'customerCreatedAt' => $this->created_at,
            'customerUpdatedAt' => $this->updated_at,
            'customerDeletedAt' => $this->deleted_t,
        ];
    }
}
