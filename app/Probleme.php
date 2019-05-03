<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Probleme extends Model
{
    protected $table = 'problemes';

    protected $fillable = [
        'id',
        'resolu',
        'dateProbleme',
        'personne',
        'categorie',
        'type',
        'accompagnement'
    ];

    public function personne()
    {
        return $this->belongsTo(Personne::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Configuration::class);
    }

    public function type()
    {
        return $this->belongsTo(Configuration::class);
    }

    public function accompagnement()
    {
        return $this->belongsTo(Configuration::class);
    }

    /*
     * protected static function boot()
    {
        parent::boot();
        static::deleting(function ($probleme) {
            $probleme->actions()->delete();
        });
    }*/

}
