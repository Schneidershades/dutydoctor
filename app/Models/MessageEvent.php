<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Message\MessageEventResource;
use App\Http\Resources\Message\MessageEventCollection;

class MessageEvent extends Model
{
    use HasFactory;

    public $oneItem = MessageEventResource::class;
    public $allItems = MessageEventCollection::class;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'message_events';
}
