<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EtudiantResource extends JsonResource
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
        'nom' => $this->nom,
        'prenom' => $this->prenom,
        'id_groupe' => $this->id_groupe,
        'absence' => $this->absence
        ];
    }
}
