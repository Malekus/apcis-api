<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Action extends JsonResource
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
            'deplacement' => $this->deplacement,
            'duree' => $this->duree,
            'dateAction' => \Carbon\Carbon::parse($this->dateAction)->format('d/m/Y'),
            'information' => $this->information,
            'droitOuvert' => $this->droitOuvert,
            'maintienDroit' => $this->maintienDroit,
            'conflit' => $this->conflit,
            'perduDeVue' => $this->perduDeVue,
            'judiciarisation' => $this->judiciarisation,
            'avancement' => $this->avancement,
            'probleme' => $this->probleme,
            'action' => $this->action,
            'complement' => $this->complement,
            'created_at' => \Carbon\Carbon::parse($this->created_at)->format('d/m/Y'),
            'updated_at' => \Carbon\Carbon::parse($this->updated_at)->format('d/m/Y'),
        ];
    }
}
