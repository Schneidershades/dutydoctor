<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerServiceRequest;
use App\Models\Specialty;
use App\Http\Resources\Offering\ServiceOfferingResource;
use App\Http\Resources\Offering\ServiceOfferingCollection;

class ServiceOffering extends Model
{
    use HasFactory;

    public $oneItem = ServiceOfferingResource::class;
    public $allItems = ServiceOfferingCollection::class;

    public function customerServiceRequest()
    {
    	return $this->hasMany(CustomerServiceRequest::class);
    }

    public function specialty()
    {
    	return $this->belongsTo(Specialty::class);
    }
}
