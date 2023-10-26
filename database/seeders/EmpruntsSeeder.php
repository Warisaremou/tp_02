<?php

namespace Database\Seeders;

use App\Models\Emprunts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpruntsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Emprunts::create([
            'id_livre' => '2',
            'id_etudiant' => '1',
            'date_emprunt' => '2023-07-08',
            'date_retour_prevue' => '2023-07-20',
            // 'date_retour_effective' => '2ème année',
        ]);
        Emprunts::create([
            'id_livre' => '1',
            'id_etudiant' => '2',
            'date_emprunt' => '2023-04-26',
            'date_retour_prevue' => '2023-05-18',
            'date_retour_effective' => '2023-05-16',
        ]);
    }
}
