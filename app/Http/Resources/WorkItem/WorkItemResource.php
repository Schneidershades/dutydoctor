<?php

namespace App\Http\Resources\WorkItem;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkItemResource extends JsonResource
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
            'workItemId' => $this->id,
            'workItemInvoiceId' => $this->invoice_id,
            'workItemDisbursementId' => $this->disbursement_id,
            'workItemCustomerId' => $this->customer_id,
            'workItemProfessionalId' => $this->professional_id,
            'workItemFacilityId' => $this->facility_id,
            'workItemSpecialtyAccreditationId' => $this->specialty_accreditation_id,
            'workItemServiceRequestId' => $this->service_request_id,
            'workItemProductRequestId' => $this->product_request_id,
            'workItemProfessionalServiceId' => $this->professional_service_id,
            'workItemFacilityServiceId' => $this->facility_service_id,
            'workItemFacilityProductId' => $this->facility_product_id,
            'workItemStatus' => $this->status,
            'workItemWorkItemType' => $this->work_item_type,
            'workItemTitle' => $this->title,
            'workItemDescription' => $this->description,
            'workItemCreatedAt' => $this->created_at,
            'workItemUpdatedAt' => $this->updated_at,
            'workItemDeletedAt' => $this->deleted_at,
        ];
    }
}
