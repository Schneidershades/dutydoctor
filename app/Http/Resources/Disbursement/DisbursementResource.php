<?php

namespace App\Http\Resources\Disbursement;

use Illuminate\Http\Resources\Json\JsonResource;

class DisbursementResource extends JsonResource
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
            'disbursementId' => $this->id,
            'disbursementAmount' => $this->amount,
            'disbursementInvoiceId' => $this->invoice_id,
            'disbursementCustomerId' => $this->customer_id,
            'disbursementDisburserUserId' => $this->disburser_user_id,
            'disbursementStatus' => $this->status,
            'disbursementTransferCode' => $this->transfer_code,
            'disbursementRecipientCode' => $this->recipient_code,
            'disbursementPaystackDisbursementDetails' => $this->paystack_disbursement_details,
            'disbursementCreatedAt' => $this->created_at,
            'disbursementUpdatedAt' => $this->updated_at,
            'disbursementDeletedAt' => $this->deleted_at,
        ];
    }
}
