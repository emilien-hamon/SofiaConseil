<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    // ...

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'competdemandes', 'id_demandes', 'id_competences');
    }
}
