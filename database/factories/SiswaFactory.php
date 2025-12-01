<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Siswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nis' => $this->faker->word,
        'nisn' => $this->faker->word,
        'nama_siswa' => $this->faker->word,
        'jenis_kelamin' => $this->faker->word,
        'tempat_lahir' => $this->faker->word,
        'tanggal_lahir' => $this->faker->word,
        'agama' => $this->faker->word,
        'alamat' => $this->faker->text,
        'no_hp' => $this->faker->word,
        'email' => $this->faker->word,
        'nama_ayah' => $this->faker->word,
        'nama_ibu' => $this->faker->word,
        'nama_wali' => $this->faker->word,
        'pekerjaan_ortu' => $this->faker->word,
        'no_hp_ortu' => $this->faker->word,
        'id_kelas_aktif' => $this->faker->randomDigitNotNull,
        'tahun_masuk' => $this->faker->word,
        'status_siswa' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
