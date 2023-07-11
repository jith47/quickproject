<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();

        \App\Models\Service::factory(50)->create();
        // $jobs = DB::table('services')->get();
        // foreach($jobs as $job) {
        //     $job = \App\Models\Service::find($job->id);
        //     $job->company_id = $faker->numberBetween(1, 10);
        //     $job->save();

        // }
    }
}
