<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;
use DB;
class UserDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();

        // foreach (range(1, 100) as $index) {
        //     $avatarPath = public_path('company/avatar/' . $faker->image('public/company/avatar', 200, 200, 'people', false));

        //     $fileName = basename($avatarPath);
        //     $filePath = 'company/avatar/' . $fileName;

        //     Storage::disk('public')->put($filePath, file_get_contents($avatarPath));

        //     $coverPath = public_path('company/covers/' . $faker->image('public/company/covers', 800, 600, 'nature', false));
        //     $fileName = basename($coverPath);
        //     $filePathcover = 'company/covers/' . $fileName;
        //     Storage::disk('public')->put($filePathcover, file_get_contents($coverPath));

        //     DB::table('users')->insert([
        //         'user_id' => $faker->numberBetween(1, 103),
        //         'profile_pic' => $filePath,
        //         'cover' => $filePathcover,
        //     ]);
        // }
        \App\Models\UserDetails::factory(50)->create();
        // DB::table('user_details')
        // ->update(['address' => $faker->address]);
    }
}
