<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class EmployeeResource extends Resource
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
            'email' => $this->user->email,
            'name' => $this->name,
            'gender' => $this->gender->name,
            'since' => $this->since,
            'position' => $this->position,
            'division' => $this->division->name
        ];
    }
}