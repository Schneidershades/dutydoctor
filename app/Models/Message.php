<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Message\MessageResource;
use App\Http\Resources\Message\MessageCollection;

class Message extends Model
{
    use HasFactory;

    public $oneItem = MessageResource::class;
    public $allItems = MessageCollection::class;

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'messages';

  public function getDestinationCustomer(){
    return User::find($this->destination_customer_id);
  }

}
