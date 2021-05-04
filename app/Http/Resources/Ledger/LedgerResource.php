<?php

namespace App\Http\Resources\Ledger;

use Illuminate\Http\Resources\Json\JsonResource;

class LedgerResource extends JsonResource
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
            'ledgerId' => $this->id,
            'ledgerMoneyTo' => $this->money_to,
            'ledgerMoneyFrom' => $this->money_from,
            'ledgerReason' => $this->reason,
            'ledgerCredit' => $this->credit,
            'ledgerDebit' => $this->debit,
            'ledgerCurrentBalance' => $this->current_balance,
            'ledgerExpenditureId' => $this->expenditure_id,
            'ledgerCustomerId' => $this->customer_id,
            'ledgerDisbursementId' => $this->disbursement_id,
            'ledgerPayId' => $this->pay_id,
            'ledgerCreatedAt' => $this->created_at,
            'ledgerUpdatedAt' => $this->updated_at,
            'ledgerDeletedAt' => $this->deleted_at,
        ];
    }
}
