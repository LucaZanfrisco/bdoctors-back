<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Message;
use App\Models\Review;
use App\Models\Sponsorship;
use App\Models\Star;
use App\Models\Typology;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use Nette\Utils\Random;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $serviceArray = ['Chirurgia Plastica', 'Prima visita', 'Colloquio Psicologico', 'Visita Dentistica', 'Ablazione', 'Pressione Oculare', 'Biometria', 'Chirurgia Cranica', 'Consulenza Online', 'Visita Specialistica', 'Innesto Cutaneo']; 
        $addressArray = ['Roma', 'Torino', 'Milano', 'Bologna', 'Palermo', 'Napoli', 'Ancona', 'Bari'];
        for($i = 0; $i < 500; $i++){
            $newUser = new User();
            $newUser->name = $faker->firstName();
            $newUser->lastname = $faker->lastName();
            $newUser->email = $newUser->name .$i .'@'.$newUser->lastname.'.com';
            $newUser->password = Hash::make('password');

            $newUser->save();

            $newDoctor = new Doctor();
            $newDoctor->user_id = $newUser->id;
            $newDoctor->description = $faker->realTextBetween(100,255);

            $serviceLength = count($serviceArray);
            for($j = 0; $j < 3;$j++){
                $service = $serviceArray[rand(0, $serviceLength - 1)];
                $newDoctor->services .= $service . ', ';
            }

            $newDoctor->visible = $faker->boolean();

            $addressLength = count($addressArray);
            $newDoctor->address = $addressArray[rand(0, $addressLength -1 )];

            $newDoctor->photo = $faker->imageUrl(200,400);

            $newDoctor->cv = $faker->imageUrl(200,400);
            
            $newDoctor->save();

            for($l = 0; $l < 10; $l++){
                $newMessage = new Message();

                $newMessage->profile_id = $newDoctor->id;
                $newMessage->name = $faker->firstName();
                $newMessage->lastname = $faker->lastName();
                $newMessage->email = $newMessage->name.$l.'@'.$newMessage->lastname.'.com';
                $newMessage->message = $faker->realTextBetween(50, 200);
    
                $newMessage->save();
            }
            
            for($l = 0; $l < 10; $l++){
                $newReview = new Review();
                $newReview->profile_id = $newDoctor->id;
                $newReview->name = $faker->firstName();
                $newReview->lastname = $faker->lastName();
                $newReview->email = $newMessage->name.$l.'@'.$newMessage->lastname.'.com';
                $newReview->text = $faker->realTextBetween(50, 200);
    
                $newReview->save();
            }

            for($k = 0; $k < 20; $k++){
                $stars = Star::inRandomOrder()->first();    
                $newDoctor->stars()->attach($stars->id);
            }

            $sponsorship = Sponsorship::inRandomOrder()->first();
        
                $startDate = date("Y-m-d H:i:s");
                $finishDate = date("Y-m-d H:i:s", strtotime("+{$sponsorship->duration} hours"));
                $newDoctor->sponsorships()->attach([
        
                    $newDoctor->id => [
                        'sponsorship_id'=>$sponsorship->id,
                        'start_date' => $startDate,
                        'end_date' => $finishDate
                    ]
        
                ]);

            $typologies = Typology::inRandomOrder()->take(2)->get();

            foreach($typologies as $typology){
                $newDoctor->typologies()->attach($typology->id);
            }

        }
    }
}
