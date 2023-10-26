<?php

namespace Database\Seeders;

use App\Models\Etudiants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtudiantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Etudiants::create([
        //     'nom' => 'AKINOCHO',
        //     'prenom' => 'Waris',
        //     'adresse' => 'Cotonou, AKPAKPA',
        //     'email' => 'warisakn@gmail.com',
        //     'telephone' => '90180282',
        //     'classe'=> '2ème année',
        // ]);

        // Etudiants::create([
        //     'nom' => 'BALOGUN',
        //     'prenom' => 'Mariam',
        //     'adresse' => 'Parakou',
        //     'email' => 'mariam52@gmail.com',
        //     'telephone' => '12345678',
        //     'classe' => '1ère année',
        // ]);

        Etudiants::create([
            'nom' => 'LASSISSI',
            'prenom' => 'Acharaf',
            'adresse' => 'Porto-Novo, Anavié',
            'email' => 'lassacharaf6@gmail.com',
            'telephone' => '12345678',
            'classe' => '3ème année',
        ]);

        Etudiants::create([
            'nom' => 'ASSOGBA',
            'prenom' => 'Oscar',
            'adresse' => 'AKPAKPA, LOM-NAVA',
            'email' => 'oscarassogba@gmail.com',
            'telephone' => '12345678',
            'classe' => '2ème année',
        ]);
    }
}
