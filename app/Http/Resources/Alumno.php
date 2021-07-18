<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Alumno extends JsonResource
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
            'cod_alumno' => $this->cod_alumno,
            'user_id' => $this->user_id,
            'direction' => $this->direction,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
