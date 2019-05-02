<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $table = 'personnes';

    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'date_naissance',
        'sexe',
        'enfant',
        'csp',
        'categorie',
        'nationalite',
        'logement',
        'telephone',
        'email',
        'adresse',
        'code_postale',
        'ville',
        'prioritaire',
        'matricule_caf'
    ];

    public function logement()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function csp()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function categorie()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function scolaire()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function situation()
    {
        return $this->belongsTo('App\Configuration');
    }
}
