<?php

namespace App\Http\Resources\Api\V1\Tasks;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\V1\Tasks\TaskCriterionResource;

class TaskResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->id,
            'enabled' => $this->enabled,
            'action' => $this->action,
            'status' => $this->status,
            'number_files' => $this->number_files,
            'size_files' => $this->size_files,
            'size_processed_files' => $this->size_processed_files,
            'src_storage_ids' => $this->sourceStorageIds(),
            'dst_storage_ids' => $this->destinationStorageIds(),
            'criteria' => TaskCriterionResource::collection($this->criteria),
        ];
    }
}
