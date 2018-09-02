<?php

namespace App\Http\Resources\Api\V1\Tasks;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Api\V1\Tasks\TaskPreviewResource;

class TasksResource extends ResourceCollection
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
            'data' => TaskPreviewResource::collection($this->collection),
        ];
    }
}
