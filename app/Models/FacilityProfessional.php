<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Facility\FacilityProfessionalResource;
use App\Http\Resources\Facility\FacilityProfessionalCollection;

class FacilityProfessional extends Model
{
    use HasFactory;

    public $oneItem = FacilityProfessionalResource::class;
    public $allItems = FacilityProfessionalCollection::class;
}
