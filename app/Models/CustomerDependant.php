<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Resources\Customer\CustomerDependantResource;
use App\Http\Resources\Customer\CustomerDependantCollection;

class CustomerDependant extends Model
{
    use HasFactory;
    public $oneItem = CustomerDependantResource::class;
    public $allItems = CustomerDependantCollection::class;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
