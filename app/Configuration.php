<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = 'configurations';

    protected $fillable = ['categorie', 'champ', 'libelle'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            foreach ($model->attributes as $key => $attribute) {
                $model->$key = ucfirst(mb_strtolower($attribute, 'UTF-8'));
            }
        });
    }
}
