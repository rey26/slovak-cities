<?php

namespace Database\Factories;

use App\Models\Settlement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Settlement>
 */
class SettlementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $settlements = Settlement::all();

        return [
            'parent_id' => $settlements->count() > 0 ? $this->faker->randomElement($settlements)['id'] : null,
            'name' => $this->faker->city(),
            'mayor_name' => $this->faker->name(),
            'city_hall_address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'fax' => $this->faker->optional()->email(),
            'email' => $this->faker->email(),
            'web_address' => $this->faker->url(),
            'lat' => $this->faker->latitude(),
            'lon' => $this->faker->longitude(),
        ];
    }
}
