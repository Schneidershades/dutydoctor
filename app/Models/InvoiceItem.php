<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Invoice\InvoiceItemResource;
use App\Http\Resources\Invoice\InvoiceItemCollection;

class InvoiceItem extends Model
{
    use HasFactory;

    public $oneItem = InvoiceItemResource::class;
    public $allItems = InvoiceItemCollection::class;
}
