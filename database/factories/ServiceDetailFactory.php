<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Service;

class ServiceDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $services = Service::pluck('id')->toArray();

        return [
            'service_id' => $this->faker->unique()->numberBetween(1,50),
            'comment' => $this->faker->paragraph(),
            'start' => $this->faker->optional($weight = 0.8)->time(),
            'address' => $this->faker->address(),
            'time_status' => $this->faker->numberBetween(0,3)            
        ];
    }
}
