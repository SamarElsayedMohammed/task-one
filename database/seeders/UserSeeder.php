<?php

namespace Database\Seeders;
use Faker\Generator as Faker;
use Faker\Factory;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $users = User::factory()->count(50000)->make();
        $chunks = $users->chunk(2000);
        
        $chunks->each(function ($chunk) {
            User::insert($chunk->toArray());
        });
        
        // for ($i =1; $i <= 15; $i++) {
        //     User::create([

        //         'name' => $faker->name(),
        //         'email' => Str::random(10).'@gmail.com',
        //         'password' => bcrypt('123123123'),
        //     ]);
        // }

        // User::factory()->count(50)->create();


// $data=[];

// for ($i =1; $i <= 50000; $i++) {
//         $data[]=[
//         'name' => Str::random(10),
//         'email' => Str::random(3).'_'.$i.'@gmail.com',
//         'password' => Hash::make('123456'),
//         'created_at'=>now(),
//         'updated_at'=>now()
//         ];
// }

//         $chunks=array_chunk($data ,500);
//                 foreach ($chunks as $chunk) {
//                     User::insert($chunk);
//                 }



    }
}
