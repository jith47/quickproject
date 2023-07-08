<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ServiceComment::factory(50)->create();
    }
}
