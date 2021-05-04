<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerServiceRequest;
use App\Http\Resources\Professional\ProfessionalServiceOfferingResource;
use App\Http\Resources\Professional\ProfessionalServiceOfferingCollection;

class ProfessionalServiceOffering extends Model
{

    use HasFactory;

    public $oneItem = ProfessionalServiceOfferingResource::class;
    public $allItems = ProfessionalServiceOfferingCollection::class;
    
    public function whoIsOfferingThisService()
    {
        return $this->morphMany(CustomerServiceRequest::class, 'serviceUserable');
    } 
}
