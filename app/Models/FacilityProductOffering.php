<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Facility\FacilityProductOfferingResource;
use App\Http\Resources\Facility\FacilityProductOfferingCollection;

class FacilityProductOffering extends Model
{
    use HasFactory;

    public $oneItem = FacilityProductOfferingResource::class;
    public $allItems = FacilityProductOfferingCollection::class;
}
