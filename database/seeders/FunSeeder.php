<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Fun::factory(50)->create();
    }
}
