<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cible extends Model
{
    protected $table = 'cibles';
    public $timestamps = true;
    protected $fillable = [
        'numero', 'compte_whatsapp', 'sexe'
    ];

    public function experiences()
    {
        return $this->belongsToMany('App\Experience');
    }

    public function photos()
    {
        return $this->hasMany('App\Photos');
    }
}
