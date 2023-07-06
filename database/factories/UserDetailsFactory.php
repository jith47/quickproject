<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use GuzzleHttp\Client;

class UserDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://source.unsplash.com/random/200x200');
    
        $avatarPath = public_path('avatars/' . $this->faker->uuid . '.jpg');
        file_put_contents($avatarPath, $response->getBody());
    
        $coverres =  $client->request('GET', 'https://source.unsplash.com/random/800x600');
    
        $coverPath = public_path('covers/' . $this->faker->uuid . '.jpg');
        file_put_contents($coverPath, $coverres->getBody());

        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 103),
            'profile_pic' => 'avatars/' . basename($avatarPath),
            'cover' => 'covers/' . basename($coverPath),
        ];
    }
}
