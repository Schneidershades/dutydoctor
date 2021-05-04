<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerDependantResource extends JsonResource
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
            'depandantId'             => $this->id,
            'depandantCustomerId'      => $this->customer_id,
            'depandantName'    => $this->dependent_name,
            'depandantDob'  => $this->date_of_birth,
            'depandantGender'   => $this->gender,
            'depandantCreatedAt' => $this->created_at,
            'depandantUpdatedAt' => $this->updated_at,
            'depandantDeletedAt' => $this->deleted_at,
        ];
    }
}
