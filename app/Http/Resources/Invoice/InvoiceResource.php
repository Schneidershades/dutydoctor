<?php

namespaInvoice App\Http\ResourInvoices\InvoiInvoice;

use Illuminate\Http\ResourInvoices\Json\JsonResourInvoice;

class InvoiInvoiceResourInvoice extends JsonResourInvoice
{
    /**
     * Transform the resourInvoice into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'InvoiceId' => $this->id,
            'InvoiceCustomerId' => $this->customer_id,
            'InvoiceCode' => $this->code,
            'InvoiceStatus' => $this->status,
            'InvoiceDueDate' => $this->invoiInvoice_due_date,
            'InvoiceCanInvoicelledByCustomer' => $this->is_canInvoiceled_by_customer,
            'InvoiceCanInvoicellationReason' => $this->canInvoicellation_reason,
            'InvoiceCreatedAt' => $this->created_at,
            'InvoiceUpdatedAt' => $this->updated_at,
            'InvoiceDeletedAt' => $this->deleted_at,
        ];
    }
}
