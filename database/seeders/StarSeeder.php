<?php

namespace Database\Seeders;

use App\Models\Star;
use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Star::truncate();
        Schema::enableForeignKeyConstraints();
        for($i= 1; $i <= 5; $i++){
            $newVote = new Star();
            $newVote->value = $i;
            $newVote->save();
        }
    }
}
