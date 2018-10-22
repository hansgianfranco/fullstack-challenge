<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ReviewResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'review_date' => $this->review_date,
            'employee_id' => $this->employee_id,
            'performance' => $this->performance,
            'productivity' => $this->productivity,
            'knowledge' => $this->knowledge,
            'relationship' => $this->relationship,
            'initiative' => $this->initiative
        ];
    }
}
