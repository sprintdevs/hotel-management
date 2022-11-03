<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Facility extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'facility_id' => $this->id,
            'name' => $this->name,
            'street' => $this->street,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'phone' => $this->phone,
            'email' => $this->email,
            'manager_id' => $this->manager_id,
        ];
    }
}
