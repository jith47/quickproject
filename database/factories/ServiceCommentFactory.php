<?php

namespace Database\Factories;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = \App\Models\User::pluck('id')->toArray();

        $client = new Client();

        $coverres =  $client->request('GET', 'https://source.unsplash.com/random/800x600');
    
        $coverPath = public_path('maintenance/files/' . $this->faker->uuid . '.jpg');
        file_put_contents($coverPath, $coverres->getBody());

        return [
            'user_id' => $this->faker->randomElement($users),
            'service_id' => $this->faker->numberBetween(1, 50),
            'comment' => $this->faker->sentence(),
            'attachment' => $coverPath,
        ];
    }
}
