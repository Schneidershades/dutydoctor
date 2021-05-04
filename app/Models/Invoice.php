<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Http\Resources\Invoice\InvoiceResource;
use App\Http\Resources\Invoice\InvoiceCollection;

class Invoice extends Model
{
    use HasFactory;

    public $oneItem = InvoiceResource::class;
    public $allItems = InvoiceCollection::class;

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }
}
