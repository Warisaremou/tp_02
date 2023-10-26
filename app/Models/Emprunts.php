<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprunts extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_livre',
        'id_etudiant',
        'date_emprunt',
        'date_retour_prevue',
        'date_retour_effective',
    ];
}
