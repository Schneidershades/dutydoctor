<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Professional\ProfessionalServiceAvailabilityResource;
use App\Http\Resources\Professional\ProfessionalServiceAvailabilityCollection;

class ProfessionalServiceAvailability extends Model
{
    use HasFactory;

    public $oneItem = ProfessionalServiceAvailabilityResource::class;
    public $allItems = ProfessionalServiceAvailabilityCollection::class;
}
