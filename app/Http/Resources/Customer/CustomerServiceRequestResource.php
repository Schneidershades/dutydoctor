<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerServiceRequestResource extends JsonResource
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
            'csrId' => $this->id,
            'csrHouseNo' => $this->location_address_house_number,
            'csrStreet' => $this->location_address_street_name,
            'csrSuburb' => $this->location_address_suburb,
            'csrCity' => $this->location_address_city,
            'csrState' => $this->location_address_state,
            'csrLocation' => $this->gps_location_name,
            'csrLong'           => $this->gps_long,
            'csrLat'       => $this->gps_lat,
            'csrGpsCity'       => $this->gps_city,
            'csrGpsState'       => $this->gps_state,
            'csrStatus'       => $this->status,
            'csrRequestedQty' => $this->requested_qty,
            'csrDueDate' => $this->service_due_date,
            'csrCancelledByCustomer' => $this->is_canceled_by_customer,
            'csrCancelledByServiceProvider' => $this->is_canceled_by_service_provider,
            'csrCancellationReason' => $this->cancellation_reason,
            'csrCustomerRequestNotes' => $this->customer_request_notes,
            'csrCustomer' => $this->customer_id,
            'csrServiceOfferId' => $this->service_offer_id,
            'csrFacilityProductId'           => $this->facility_product_id,
            'csrProfessionalServiceId'           => $this->professional_service_id,
            'csrFacilityServiceId'           => $this->facility_service_id,
            'csrOriginator'       => $this->originator,
            'csrOriginatorId'       => $this->originator_id,
            'csrUnitPrice' => $this->unit_price,
            'csrVatAmount' => $this->vat_amount,
            'csrPriceMarkup' => $this->price_markup_pct,
            'csrFinalUnitPrice' => $this->final_unit_price,
        ];
    }
}
