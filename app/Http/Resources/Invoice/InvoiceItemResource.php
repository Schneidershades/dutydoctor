<?php

namespace App\Http\Resources\Invoice;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceItemResource extends JsonResource
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
            'invoiceItemId' => $this->id,
            'invoiceItemInvoiceId' => $this->invoice_id,
            'invoiceItemServiceRequestId' => $this->service_request_id,
            'invoiceItemProductRequestId' => $this->product_request_id,
            'invoiceItemQty' => $this->qty,
            'invoiceItemUnitPrice' => $this->unit_price,
            'invoiceItemVatAmount' => $this->vat_amount,
            'invoiceItemPriceMarkup' => $this->price_markup_pct,
            'invoiceItemFinalUnitPrice' => $this->final_unit_price,
            'invoiceItemCreatedAt' => $this->created_at,
            'invoiceItemUpdatedAt' => $this->updated_at,
            'invoiceItemDeletedAt' => $this->deleted_at,
        ];
    }
}
