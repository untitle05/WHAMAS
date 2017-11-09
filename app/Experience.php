<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';
    public $timestamps = true;
    protected $fillable = [
        'nom_operateur', 'borne_min', 'borne_max', 'date_experience'
    ];

    public function cibles()
    {
        return $this->belongsToMany('App\Cible', 'experiences_cibles', 'experiences_id', 'cibles_id');
    }
}
