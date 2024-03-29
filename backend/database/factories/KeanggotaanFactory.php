<?php

namespace Database\Factories;

use Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keanggotaan>
 */
class KeanggotaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $jabatan = ['Keta Senat', 'Anggota Senat', 'Komisi'];
        $pendidikan = ['SD', 'SMP', 'SMA'];
        return [
            'nama' => $this->faker->name(),
            'jabatan' => Arr::random($jabatan),
            'pendidikan' => Arr::random($pendidikan),
            'foto_name' => 'no-picture.png',
            'foto_path' => '/img/no-picture.png',
            'created_user' => 1,
            'modified_user' => 1
        ];
    }
}
