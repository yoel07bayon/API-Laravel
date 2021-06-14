<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnioLectivo extends JsonResource
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
            'estado' => $this->estado,
            'nombre' => $this->nombre,
            //'inicio' => $this->inicio->format('d/m/Y'),
            //'fin' => $this->fin->format('d/m/Y'),
        ];
    }
}
