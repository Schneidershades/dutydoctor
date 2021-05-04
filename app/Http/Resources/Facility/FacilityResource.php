<?php

namespace App\Http\Resources\Facility;

use Illuminate\Http\Resources\Json\JsonResource;

class FacilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public facnction toArray($request)
    {
        return [
            'facId' => $this->id,
            'facPublicCode' => $this->public_code,
            'facTelephone' => $this->telephone,
            'facShortName' => $this->short_name,
            'facFullName' => $this->full_name,
            'facDescription' => $this->profile_description,
            'facYearEstablished' => $this->year_established,
            'facEmail' => $this->primary_email,
            'facPhone' => $this->primary_telephone,
            'facWebsite' => $this->website,
            'facBalance' => $this->account_balance,
            'facBankName' => $this->bank_name,
            'facBankAccountName' => $this->bank_account_name,
            'facBankAccountNumber' => $this->bank_account_number,
            'facBankCode' => $this->paystack_bank_code,
            'facBankVerification' => $this->paystack_bank_account_verification_details,
            'facBankCodeReceived' => $this->paystack_recipient_code,
            'facBankRecipentDetails' => $this->paystack_recipient_details,
            'facBankAccountVerified' => $this->is_bank_account_verified,
            'facBankVerifiedDate' => $this->bank_account_verified_at,
            'facDisabled' => $this->is_disabled,
            'facDisabledReason' => $this->disable_reason,
            'facDisableDate' => $this->disabled_at,
            'facDisableActionUserId' => $this->disabling_user_id,
            'facImage' => $this->profile_image,
            'facImage1' => $this->profile_image1,
            'facImage2' => $this->profile_image2,
            'facImage3' => $this->profile_image3,
            'facImage4' => $this->profile_image4,
            'facImage5' => $this->profile_image5,
            'facDefaultPriceMarkup' => $this->default_price_markup_pct,
            'facCreatedAt' => $this->created_at,
            'facUpdatedAt' => $this->updated_at,
            'facDeletedAt' => $this->deleted_at,
        ];
    }
}
