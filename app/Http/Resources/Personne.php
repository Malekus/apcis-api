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
            'logement' => $this->logement,
            'csp' => $this->csp,
            'categorie' => $this->categorie,
            'scolaire' => $this->scolaire,
            'situation' => $this->situation,
            'problemes' => $this->problemes,
            'created_at' => \Carbon\Carbon::parse($this->created_at)->format('d/m/Y'),
            'updated_at' => \Carbon\Carbon::parse($this->updated_at)->format('d/m/Y'),
        ];
    }
}
