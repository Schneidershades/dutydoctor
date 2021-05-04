<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Offering\OfferingInCategoryResource;
use App\Http\Resources\Offering\OfferingInCategoryCollection;

class OfferingInCategory extends Model
{
    use HasFactory;

    public $oneItem = OfferingInCategoryResource::class;
    public $allItems = OfferingInCategoryCollection::class;
}
