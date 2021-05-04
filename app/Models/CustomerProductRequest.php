<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Resources\Customer\CustomerProductRequestResource;
use App\Http\Resources\Customer\CustomerProductRequestCollection;

class CustomerProductRequest extends Model
{
    use HasFactory;

    public $oneItem = CustomerProductRequestResource::class;
    public $allItems = CustomerProductRequestCollection::class;
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
