<?php

namespace Database\Factories;

use Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DokumenPleno>
 */
class DokumenPlenoFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        $status = ['Disahkan', 'Dipertimbangkan', 'Belum Disahkan'];

        return [
            'no_surat' => $this->faker->company(),
            'dokumen_name' => 'no-picture.png',
            'dokumen_path' => '/img/no-picture.png',
            'keterangan' => $this->faker->text(50),
            'status' => Arr::random($status),
            'created_user' => 1,
            'modified_user' => 1,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime()
        ];
    }
}
