<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    public function statut()
{
    return $this->belongsTo(Statut::class, 'id_statuts');
}


    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'competdemandes', 'id_demandes', 'id_competences');
    }
}
