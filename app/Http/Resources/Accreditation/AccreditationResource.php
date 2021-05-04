<?php

namespace App\Http\Resources\Accreditation;

use Illuminate\Http\Resources\Json\JsonResource;

class AccreditationResource extends JsonResource
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
            'accid' => $this->id,
            'accFacilityId' => $this->facility_id,
            'accProfessionalId' => $this->professional_id,
            'accSpecialty' => $this->specialty_id,
            'accShortName' => $this->short_name,
            'accAccreditationNumber' => $this->accreditation_number,
            'accAccreditationBody' => $this->accreditation_body,
            'accIssueDate' => $this->issue_date,
            'accExpireDate' => $this->expire_date,
            'accVerificationStatus' => $this->verification_status,
            'accVerifiedAt' => $this->verified_at,
            'accVerifyingUser' => $this->verifying_user_id,
        ];
    } 
}
