<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Facility\FacilityServiceAvailabilityResource;
use App\Http\Resources\Facility\FacilityServiceAvailabilityCollection;

class FacilityServiceAvailability extends Model
{
    use HasFactory;

    public $oneItem = FacilityServiceAvailabilityResource::class;
    public $allItems = FacilityServiceAvailabilityCollection::class;
}
