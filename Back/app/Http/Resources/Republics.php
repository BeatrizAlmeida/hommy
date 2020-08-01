<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Republics extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'price'=>$this->price,
            'description'=>$this->description,
            'bedrooms'=>$this->bedrooms,
            'bathrooms'=>$this->bathrooms,
            'numberResidents'=>$this->numberResidents,
            'street'=>$this->street,
            'houseNumber'=>$this->houseNumber,
            'neighborhood'=>$this->neighborhood,
            'city'=>$this->city,
            'locator_id'=>$this->locator_id,
            'tenant_id'=>$this->tenant_id,
        ];
    }
}
