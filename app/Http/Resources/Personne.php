<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Personne extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'date_naissance' => $this->date_naissance,
            'sexe' => $this->sexe,
            'enfant' => $this->enfant,
            'nationalite' => $this->nationalite,
            'telephone' => $this->telephone,
            'email' => $this->email,
            'adresse' => $this->adresse,
            'code_postale' => $this->code_postale,
            'ville' => $this->ville,
            'prioritaire' => $this->prioritaire,
            'matricule_caf' => $this->matricule_caf,
            'logement_id' => $this->logement_id,
            'csp_id' => $this->csp_id,
            'categorie_id' => $this->categorie_id,
            'scolaire_id' => $this->scolaire_id,
            'situdation_id' => $this->situdation_id,
            'created_at' => \Carbon\Carbon::parse($this->created_at)->format('d/m/Y'),
            'updated_at' => \Carbon\Carbon::parse($this->updated_at)->format('d/m/Y'),
        ];
    }
}
