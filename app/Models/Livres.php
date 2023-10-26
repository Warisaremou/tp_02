<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livres extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'auteur',
        'disponibilite',
        'resume',
        'localisation',
    ];
}
