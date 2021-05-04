<?php

namespace App\Http\Resources\Offering;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferingCategoryResource extends JsonResource
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
            'ocId' => $this->id,
            'ocCategoryName' => $this->category_name,
            'ocDescription' => $this->description,
            'ocImage' => $this->profile_image,
            'ocParentId' => $this->parent_id,
            'ocLft' => $this->lft,
            'ocRgt' => $this->rgt,
            'ocDepth'           => $this->depth,
            'ocCreatedAt'       => $this->created_at,
            'ocUpdatedAt'       => $this->updated_at,
            'ocDeletedAt'       => $this->deleted_at,
        ];
    }
}
