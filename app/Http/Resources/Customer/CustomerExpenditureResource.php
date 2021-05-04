<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerExpenditureResource extends JsonResource
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
            'ceId' => $this->id,
            'ceExpenseAmount' => $this->expense_amount,
            'ceInvoiceId' => $this->invoice_id,
            'ceCustomerId' => $this->customer_id,
            'ceDescription' => $this->description,
            'ceCreatedAt' => $this->created_at,
            'ceUpdatedAt' => $this->updated_at,
            'ceDeletedAt' => $this->deleted_at,
        ];
    }
}
