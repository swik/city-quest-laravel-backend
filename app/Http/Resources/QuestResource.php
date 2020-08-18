<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestResource extends JsonResource
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
            'title' => $this->name,
            'creator' => $this->creator->name,
            'description' => $this->description,
            'check_points' => $this->check_points,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
