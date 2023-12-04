<?php

namespace Database\Seeders;

use App\Models\Star;
use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies = ["Allergologia", "Cardiologia", "Chirurgia", "Dermatologia", 
        "Endocrinologia", "Fisiatria", "Fisioterapia", "Gastroenterologia", 
        "Geriatria", "Ginecologia", "Logopedista", "Medicina del lavoro", 
        "Neurochirurgia", "Oncologia", "Odontoiatria", "Ortopedia", 
        "Osteopatia", "Otorinolaringoiatria", "Pediatria", "Pneumologia", 
        "Psichiatria", "Psicologia", "Urologia" ];
        Schema::disableForeignKeyConstraints();
        Typology::truncate();
        Schema::enableForeignKeyConstraints();
        foreach($typologies as $typology){
            $new_typology = new Typology();
            $new_typology->name = $typology;

            $new_typology->save();
        }
    }
}
