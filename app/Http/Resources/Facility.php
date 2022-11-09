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
            'type' => 'facility',
            'id' => $this->id,
            'attributes' => [
                'name' => $this->name,
                'address' => $this->address,
                'phone' => $this->phone,
                'email' => $this->email,
                'manager' => $this->manager->name,
            ],
            'links' => [
                'self' => $this->path,
            ]
        ];
    }
}
