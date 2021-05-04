<?php

namespace App\Http\Resources\WorkItem;

use Illuminate\Http\Resources\Json\ResourceCollection;

class WorkItemAssignmentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => WorkItemAssignmentResource::collection($this->collection)
        ];
    }
}
