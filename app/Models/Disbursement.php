<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Http\Resources\Disbursement\DisbursementResource;
use App\Http\Resources\Disbursement\DisbursementCollection;

class Disbursement extends Model
{
    use HasFactory;

    public $oneItem = DisbursementResource::class;
    public $allItems = DisbursementCollection::class;

    public function getDisburserUser(){
        return User::where('id',$this->disburser_user_id)->first();
    }

    public function getDisbursedDateString(){
        return Carbon\Carbon::parse($this->created_at)->format("M d, Y");
    }

    public function getDisbursedDateDurationString(){
        return Carbon\Carbon::now()->diffForHumans(Carbon\Carbon::parse($this->created_at), true). " ago";
    }


}
