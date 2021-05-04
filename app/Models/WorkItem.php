<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\WorkItem;
use App\Models\Customer;
use App\Models\LoanRequest;
use App\Models\Loan;
use App\Models\WorkItemAssignment;
use App\Models\Comment;
use App\Http\Resources\WorkItem\WorkItemResource;
use App\Http\Resources\WorkItem\WorkItemCollection;

class WorkItem extends Model
{
    use HasFactory;

    public $oneItem = WorkItemResource::class;
    public $allItems = WorkItemCollection::class;

    public function getCustomer(){
        return $this->belongsTo(Customer::class);
    }

    public function getLoanRequest(){
        return $this->belongsTo(LoanRequest::class);
    }

    public function getLoan(){
        return $this->belongsTo(Loan::class);
    }

    public function getLoanOffer(){
        return $this->belongsTo(LoanOffer::class);
    }

    public function currentAssignments(){
        //return all uncompleted assignments for this work item.
        $items = WorkItemAssignment::where('work_item_id', $this->id)
          ->where('is_completed', false)
          ->orderBy('id','desc')
          ->get();
        return $items;
    }

    public function activeAssignment(){
        //return the current active assignment for this work item.
        $item = WorkItemAssignment::where('work_item_id', $this->id)
          ->where('is_current', true)
          ->orderBy('id','desc')
          ->first();
        return $item;
    }

    /**
     * Return all assignments related to this work item
     */
    public function assignments()
    {
        return $this->hasMany(WorkItemAssignment::class);
    }

    public function getViewRouteLink(){
        if ($this->loan_id!=null){
            return route("loan-view", $this->loan_id);
        }elseif ($this->loan_offer_id!=null){   
            return route("loan-offer-view", $this->loan_offer_id);
        }elseif ($this->loan_request_id!=null){ 
            return route("loan-request-view", $this->loan_request_id);
        }elseif ($this->customer_id!=null){     
            return route("customer-view",$this->customer_id);
        }
        return "#";
    }

    public function getLatestComment(){
        return Comment::where('work_item_id', $this->id)->orderBy('id','desc')->first();
    }

    /**
     * Return all comments related to this work item
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getCreateDateString(){
        return Carbon\Carbon::parse($this->created_at)->format("M d, Y");
    }

    public function getCreatedDateDurationString(){
        return Carbon\Carbon::now()->diffForHumans(Carbon\Carbon::parse($this->created_at), true). " ago";
    }


}
