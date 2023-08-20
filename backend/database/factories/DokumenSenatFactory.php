<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DokumenSenat>
 */
class DokumenSenatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul_dokumen' => $this->faker->company(),
            'dokumen_name' => 'no-picture.png',
            'dokumen_path' => '/img/no-picture.png',
            'keterangan' => $this->faker->text(50),
            'link_url' => $this->faker->text(20),
            'created_user' => 1,
            'modified_user' => 1,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime()
        ];
    }
}
