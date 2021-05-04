<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\WorkItem;
use App\Models\WorkItemAssignment;
use App\Models\Comment;
use App\Http\Resources\WorkItem\WorkItemAssignmentResource;
use App\Http\Resources\WorkItem\WorkItemAssignmentCollection;

class WorkItemAssignment extends Model
{
  use HasFactory;

  public $oneItem = WorkItemAssignmentResource::class;
  public $allItems = WorkItemAssignmentCollection::class;

  //Returns the model of the user assigning this work item.
  public function assigner(){
    return $this->hasOne(User::class, 'id', 'assigner_user_id');
  }

  //Returns the model of the user this work item was assigned to.
  public function assigned(){
    return $this->hasOne(User::class, 'id', 'assigned_user_id');
  }

  //returns the model of the work item being assigned.
  public function workitem(){
    return $this->hasOne(WorkItem::class, 'id', 'work_item_id');
  }

  //returns all the comments on this assignment.
  public function comments(){
    $items = Comment::where('work_assignment_id', $this->id)
    ->orderBy('id', 'desc')
    ->get();
    return $items;
  }

  public function getAssignedDateString(){
    return Carbon\Carbon::parse($this->attributes['created_at'])->format("M d, Y");
  }

  public static function getAllCurrentAssignments(){
      //return the current active assignment for this work item.
    return WorkItemAssignment::where('is_completed', false)
    ->where('is_current', true)
    ->orderBy('id','desc')
    ->get();
  }

  public static function getValidationRules(){
    return array(
      'assigner_user_id' =>'required|numeric',
      'assigned_user_id' =>'required|numeric',
      'work_item_id' =>'required|numeric',
    );
  }


}
