<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->name(),
            'isi' => $this->faker->paragraphs(2, true),
            'foto_name' => 'no-picture.png',
            'foto_path' => '/img/no-picture.png',
            'created_user' => 1,
            'modified_user' => 1,
            'tanggal_unggah' => $this->faker->dateTime(),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
