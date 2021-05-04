<?php

namespace App\Http\Resources\WorkItem;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkItemAssignmentResource extends JsonResource
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
            'workItemAssId' => $this->id,
            'workItemAssParentId' => $this->parent_id,
            'workItemAssActualDurationDays' => $this->actual_duration_days,
            'workItemAssAssignerUser' => $this->assigner_user_id,
            'workItemAssAssignedUser' => $this->assigned_user_id,
            'workItemAssWorkItem' => $this->work_item_id,
            'workItemAssIsCurrent' => $this->is_current,
            'workItemAssIsAccepted' => $this->is_accepted,
            'workItemAssIsRejected' => $this->is_rejected,
            'workItemAssIsCompleted' => $this->is_completed,
            'workItemAssAcceptedDate' => $this->accepted_date,
            'workItemAssCompletedDate' => $this->completed_date,
            'workItemAssStatus' => $this->status,
            'workItemAssCreatedAt' => $this->created_at,
            'workItemAssUpdatedAt' => $this->updated_at,
            'workItemAssDeletedAt' => $this->deleted_at,
        ];
    }
}
