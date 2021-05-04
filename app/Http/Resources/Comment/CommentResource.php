<?php

namespace App\Http\Resources\Comment;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'commentId' => $this->id,
            'commentParentId' => $this->parent_id,
            'commentWorkItem' => $this->work_item_id,
            'commentWorkAssignment' => $this->work_assignment_id,
            'commentUserId' => $this->user_id,
            'commentContent' => $this->content,
            'commentCreatedAt' => $this->created_at,
            'commentUpdatedAt' => $this->updated_at,
            'commentDeletedAt' => $this->deleted_at,
        ];
    }
}
