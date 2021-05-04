<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Offering\ProductOfferingResource;
use App\Http\Resources\Offering\ProductOfferingCollection;

class ProductOffering extends Model
{
    use HasFactory;

    public $oneItem = ProductOfferingResource::class;
    public $allItems = ProductOfferingCollection::class;
}
