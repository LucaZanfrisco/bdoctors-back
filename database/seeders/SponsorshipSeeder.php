<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsor = [
            [
                'name' => 'Standard',
                'price' => '2.99',
                'duration' => '24'
            ],
            [
                'name' => 'Gold',
                'price' => '5.99',
                'duration' => '72'
            ],
            [
                'name' => 'Platinum',
                'price' => '9.99',
                'duration' => '144'
            ]
            ];

        foreach($sponsor as $data){
            $newSponsor = new Sponsorship();
            $newSponsor->name = $data['name'];
            $newSponsor->price = $data['price'];
            $newSponsor->duration = $data['duration'];

            $newSponsor->save();
        }
    }
}
