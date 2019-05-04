<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caf extends Model
{
    protected $table = 'cafs';

    public function personne()
    {
        return $this->belongsTo('App\Personne');
    }

    public function motif()
    {
        return $this->belongsTo('App\Configuration');
    }
}
