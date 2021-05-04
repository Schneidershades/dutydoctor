<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\WorkItem;
use App\Models\WorkItemAssignment;
use App\Http\Resources\Comment\CommentResource;
use App\Http\Resources\Comment\CommentCollection;

class Comment extends Model
{
    use HasFactory;

    public $oneItem = CommentResource::class;
    public $allItems = CommentCollection::class;

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function getWorkItem(){
        return $this->belongsTo(WorkItem::class);
    }

    public function getAssignment(){
        return $this->belongsTo(WorkItemAssignment::class);
    }

    public function getResponseComments(){
        return Comment::where('parent_id', $this->id)->get();
    }

    public function getCommentedDateString(){
        return Carbon\Carbon::parse($this->created_at)->format("M d, Y @ g:i:s a");
    }

}
