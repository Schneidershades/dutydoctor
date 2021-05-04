<?php

namespace App\Http\Resources\PayAttempt;

use Illuminate\Http\Resources\Json\JsonResource;

class PayAttemptResource extends JsonResource
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
            'payAttemptId' => $this->id,
            'payAttemptPayAttemptCode' => $this->pay_attempt_code,
            'payAttemptPayAmount' => $this->pay_amount,
            'payAttemptCustomerId' => $this->customer_id,
            'payAttemptReference' => $this->payment_gateway_reference_code,
            'payAttemptGateway' => $this->payment_gateway_name,
            'payAttemptGateWayResponse' => $this->payment_gateway_response,
            'payAttemptPaymentInstrumentTyppe' => $this->payment_instrument_type,
            'payAttemptStatus' => $this->payment_status,
            'payAttemptVerified' => $this->is_payment_verified,
            'payAttemptGatewayVerification' => $this->payment_gateway_verification,
            'payAttemptCreatedAt' => $this->created_at,
            'payAttemptUpdatedAt' => $this->updated_at,
            'payAttemptDeletedAt' => $this->deleted_at,
        ];
    }
}
