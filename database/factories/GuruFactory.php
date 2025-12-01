<?php

namespace Database\Factories;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guru::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nip' => $this->faker->word,
        'nama_guru' => $this->faker->word,
        'jenis_kelamin' => $this->faker->word,
        'tempat_lahir' => $this->faker->word,
        'tanggal_lahir' => $this->faker->word,
        'alamat' => $this->faker->text,
        'no_hp' => $this->faker->word,
        'email' => $this->faker->word,
        'pendidikan_terakhir' => $this->faker->word,
        'tanggal_mulai' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
