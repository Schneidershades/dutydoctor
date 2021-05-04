<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Facility\FacilityLocationResource;
use App\Http\Resources\Facility\FacilityLocationCollection;

class FacilityLocation extends Model
{
    use HasFactory;

    public $oneItem = FacilityLocationResource::class;
    public $allItems = FacilityLocationCollection::class;
}
