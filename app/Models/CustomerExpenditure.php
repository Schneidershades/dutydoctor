<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Customer;
use App\Models\Invoice;
use App\Http\Resources\Customer\CustomerExpenditureResource;
use App\Http\Resources\Customer\CustomerExpenditureCollection;

class CustomerExpenditure extends Model
{
    use HasFactory;

    public $oneItem = CustomerExpenditureResource::class;
    public $allItems = CustomerExpenditureCollection::class;
    
    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }  
}
