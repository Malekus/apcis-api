<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'actions';

    protected $fillable = ['*'];

    public function probleme()
    {
        return $this->belongsTo('App\Probleme');
    }

    public function action()
    {
        return $this->belongsTo('App\Configuration');
    }

    public function complement()
    {
        return $this->belongsTo('App\Configuration');
    }
}
