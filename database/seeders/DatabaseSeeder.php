<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('lt_LT');

        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Briedis',
            'email' => 'briedis@gmail.com',
            'password' => Hash::make('123'),
        ]);

        DB::table('users')->insert([
            'name' => 'Lokys',
            'email' => 'lokys@gmail.com',
            'password' => Hash::make('123'),
        ]);

        foreach (range(1, 4) as $_) {
            DB::table('stories')->insert([
                'author_id' => $faker->randomElement([1, 2, 3]),
                'title' => $faker->sentence(6),
                'story' => $faker->text(300),
                'goal_amount' => $faker->randomFloat(0, 0, 1000),
                'main_img' => rand(1,3).'.png',
            ]);
        }

        foreach (range(1, 12) as $_) {
            DB::table('tags')->insert([
                'name' => $faker->word()
            ]);
        }

        $tags = range(1,12);
        shuffle($tags);

        foreach (range(1,4) as $s) {
            foreach (range(1, rand(0,11)) as $t) {
                DB::table('story_tag')->insert([
                    'story_id' => $s,
                    'tag_id' => $tags[$t]
                ]);
            }
        }

    }
}
