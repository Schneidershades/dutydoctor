<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Customer;
use App\Models\ServiceOffering;
use App\Http\Resources\Customer\CustomerServiceRequestResource;
use App\Http\Resources\Customer\CustomerServiceRequestCollection;

class CustomerServiceRequest extends Model
{
    use HasFactory;

    public $oneItem = CustomerServiceRequestResource::class;
    public $allItems = CustomerServiceRequestCollection::class;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }

    public function serviceOffering()
    {
    	return $this->belongsTo(ServiceOffering::class);
    }

    public function serviceUserable()
    {
        return $this->morphTo();
    }
}
