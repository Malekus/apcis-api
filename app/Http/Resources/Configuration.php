<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Configuration extends JsonResource
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
            'categorie' => $this->categorie,
            'champ' => $this->champ,
            'libelle' => $this->libelle,
            'created_at' => \Carbon\Carbon::parse($this->created_at)->format('d/m/Y'),
            'updated_at' => \Carbon\Carbon::parse($this->updated_at)->format('d/m/Y'),
        ];

    }
}
