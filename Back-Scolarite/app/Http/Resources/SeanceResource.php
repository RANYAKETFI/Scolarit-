<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SeanceResource extends JsonResource
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
        'module' => $this->module,
        'date' => $this->date,
        'id_groupe' => $this->id_groupe,
        'duree' => $this->duree,
        'id_enseignant' => $this->id_enseignant,
        ];
    }
}
