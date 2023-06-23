<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DokumenKomisi>
 */
class DokumenKomisiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no_surat' => $this->faker->company(),
            'dokumen_name' => 'no-picture.png',
            'dokumen_path' => '/img/no-picture.png',
            'keterangan' => $this->faker->text(50),
            'created_user' => 1,
            'modified_user' => 1,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime()
        ];
    }
}
