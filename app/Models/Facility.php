<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Resources\Facility\FacilityResource;
use App\Http\Resources\Facility\FacilityCollection;

class Facility extends Model
{
    use HasFactory;

    public $oneItem = FacilityResource::class;
    public $allItems = FacilityCollection::class;
}
