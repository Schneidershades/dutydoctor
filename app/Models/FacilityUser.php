<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Resources\Facility\FacilityUserResource;
use App\Http\Resources\Facility\FacilityUserCollection;

class FacilityUser extends Model
{
    use HasFactory;

    public $oneItem = FacilityUserResource::class;
    public $allItems = FacilityUserCollection::class;

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
