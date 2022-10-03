<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[];
        $user=collect(User::all()->modelKeys());

for ($i =1; $i <= 70000; $i++) {
        $data[]=[
        'user_id' => $user->random(),
        'name' => Str::random(10),
        'note' => Str::random(15),
        'created_at'=>now(),
        'updated_at'=>now()
        ];
}

        $chunks=array_chunk($data ,500);
                foreach ($chunks as $chunk) {
                    Post::insert($chunk);
                }


    }
    }

