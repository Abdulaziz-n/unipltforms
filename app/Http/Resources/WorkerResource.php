<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WorkerResource extends JsonResource
{
    public static $wrap = false;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'passport_series' => $this->passport_series,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'surname' => $this->surname,
            'position' => $this->position,
            'phone' => $this->phone,
            'address' => $this->address,
            'company' => $this->whenLoaded('company'),
        ];
    }
}
