<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $table = 'photos';
    public $timestamps = true;
    protected $fillable = [
        'cibles_id', 'nom'
    ];

    public function cibles()
    {
        return $this->belongsTo('App\Cible');
    }

}
