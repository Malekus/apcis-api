<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    protected $table = 'personnes';

    protected $fillable = ['*'];

    public function problemes()
    {
        return $this->hasMany(Probleme::class);
    }

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
