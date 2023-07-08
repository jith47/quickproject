<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $admin = User::where('type', 1)->pluck('id')->toArray();
        $consumer = User::where('type', 3)->pluck('id')->toArray();
        $email = User::where('type', 3)->pluck('email')->toArray();

        return [
            'name' => $this->faker->jobTitle(),
            'ref_id' => '#' . $this->faker->regexify('[A-Za-z0-9]{10}'),
            'email' => $this->faker->randomElement($email),
            'type' => $this->faker->numberBetween(0, 5),
            'created_by' => $this->faker->randomElement($admin),
            'service_for' => $this->faker->randomElement($consumer),
            'report_id' => $this->faker->numberBetween(1, 20),
            'quote_id' => $this->faker->numberBetween(1, 20),
            'invoice_id' => $this->faker->numberBetween(1, 20)
        ];
    }
}
