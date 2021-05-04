<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerProductRequestResource extends JsonResource
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
            'cprId' => $this->id,
            'cprHouseNo' => $this->location_address_house_number,
            'cprStreet' => $this->location_address_street_name,
            'cprSuburb' => $this->location_address_suburb,
            'cprCity' => $this->location_address_city,
            'cprState' => $this->location_address_state,
            'cprLocation' => $this->gps_location_name,
            'cprLong'           => $this->gps_long,
            'cprLat'       => $this->gps_lat,
            'cprGpsCity'       => $this->gps_city,
            'cprGpsState'       => $this->gps_state,
            'cprStatus'       => $this->status,
            'cprRequestedQty' => $this->requested_qty,
            'cprCancelledByCustomer' => $this->is_canceled_by_customer,
            'cprCancelledByServiceProvider' => $this->is_canceled_by_service_provider,
            'cprCancellationReason' => $this->cancellation_reason,
            'cprCustomerRequestNotes' => $this->customer_request_notes,
            'cprCustomer' => $this->customer_id,
            'cprFacilityProductId'           => $this->facility_product_id,
            'cprOriginator'       => $this->originator,
            'cprOriginatorId'       => $this->originator_id,
            'cprUnitPrice' => $this->unit_price,
            'cprVatAmount' => $this->vat_amount,
            'cprPriceMarkup' => $this->price_markup_pct,
            'cprFinalUnitPrice' => $this->final_unit_price,
        ];
    }
}
