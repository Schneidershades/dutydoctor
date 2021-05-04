<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerServiceRequest;
use App\Http\Resources\Facility\FacilityServiceOfferingResource;
use App\Http\Resources\Facility\FacilityServiceOfferingCollection;

class FacilityServiceOffering extends Model
{
    use HasFactory;

    public $oneItem = FacilityServiceOfferingResource::class;
    public $allItems = FacilityServiceOfferingCollection::class;

    public function whoIsOfferingThisService()
    {
        return $this->morphMany(CustomerServiceRequest::class, 'serviceUserable');
    } 
}
