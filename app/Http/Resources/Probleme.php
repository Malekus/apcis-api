<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Probleme extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'resolu' => $this->resolu,
            'dateProbleme' => \Carbon\Carbon::parse($this->dateProbleme)->format('d/m/Y'),
            'personne' => $this->personne,
            'categorie' => $this->categorie,
            'type' => $this->type,
            'accompagnement' => $this->accompagnement,
            'created_at' => \Carbon\Carbon::parse($this->created_at)->format('d/m/Y'),
            'updated_at' => \Carbon\Carbon::parse($this->updated_at)->format('d/m/Y'),
        ];
    }
}
