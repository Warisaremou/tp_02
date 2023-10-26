<?php

namespace Database\Seeders;

use App\Models\Livres;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Livres::create([
            'titre' => 'Livre 1',
            'auteur' => 'Auteur 1',
            'resume' => 'Bref résumé du livre 1',
            'disponibilite' => 'disponible',
            'localisation' => 'Première étagère à gauche',
        ]);

        Livres::create([
            'titre' => 'Livre 2',
            'auteur' => 'Auteur 2',
            'resume' => 'Bref résumé du livre 2',
            'disponibilite' => 'disponible',
            'localisation' => 'Première étagère à droite',
        ]);
    }
}
