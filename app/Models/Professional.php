<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Resources\Professional\ProfessionalResource;
use App\Http\Resources\Professional\ProfessionalCollection;

class Professional extends Model
{
    use HasFactory;

    public $oneItem = ProfessionalResource::class;
    public $allItems = ProfessionalCollection::class;

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }
}
