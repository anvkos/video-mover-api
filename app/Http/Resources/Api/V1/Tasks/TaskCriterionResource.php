<?php

namespace App\Http\Resources\Api\V1\Tasks;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskCriterionResource extends JsonResource
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
            'property' => $this->property,
            'sign' => $this->sign,
            'number' => $this->number,
            'unit_name' => $this->unit_name,
            'sorting_direction' => $this->sorting_direction,
        ];
    }
}
