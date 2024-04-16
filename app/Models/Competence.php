<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competence extends Model
{
    // ...

    public function demandes()
    {
        return $this->belongsToMany(Demande::class, 'competdemandes', 'id_competences', 'id_demandes');
    }
}
