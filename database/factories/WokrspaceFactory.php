<?php

namespace Database\Factories;

use App\Models\Anggota;
use App\Models\Seksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WokrspaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->word(3),
            'author_id' => fake()->randomElement([340062002,340060123]),
            'seksi_id' => fake()->randomElement([1,2,3,4,5,6]),
        ];
    }
}
