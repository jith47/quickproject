<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;
use \App\Models\ServiceTechnician;

class ServiceTechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                // $table->integer('user_id');
        //     $table->integer('service_id');
        //     $table->integer('like')->nullable();
        //     $table->text('comment')->nullable();
        //     $table->text('note')->nullable();
        $faker = Faker::create();
        $jobs = DB::table('services')->get();
        for ($i = 0; $i < 100; $i++) {
            $jobd = $faker->randomElement($jobs);
            $c = DB::table('companies')->first();
            $users = DB::table('users')->where('company_id', $c->id)->get();
            $user = $faker->randomElement($users);

            $job = new ServiceTechnician();
            $job->user_id = $user->id;
            $job->service_id = $jobd->id;
            $job->like = $faker->numberBetween(1, 20);
            $job->comment = $faker->paragraph;
            $job->note = $faker->sentence;
            $job->save();

        }
        // \App\Models\ServiceTechnician::factory(50)->create();

    }
}
