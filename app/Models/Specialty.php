<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specialty;
use App\Http\Resources\Specialty\SpecialtyResource;
use App\Http\Resources\Specialty\SpecialtyCollection;

class Specialty extends Model
{
    use HasFactory;

    public $oneItem = SpecialtyResource::class;
    public $allItems = SpecialtyCollection::class;

    public function serviceOfferings()
    {
    	return $this->hasMany(Specialty::class);
    }
}
