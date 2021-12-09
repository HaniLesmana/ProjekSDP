<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pegawai::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $saldo = $this->faker->numberBetween(50,999999) * 1000;
        $jasa = ['Cleaning','Painting','Plumbing','Electrical','Repair'];
        return [
            "pegawai_nik" => $this->faker->unique()->numberBetween(1000000000000000,9999999999999999),
            "pegawai_email" => $this->faker->unique()->safeEmail(),
            "pegawai_nama" => $this->faker->name(),
            "pegawai_telepon" => $this->faker->phoneNumber(),
            "pegawai_alamat" => $this->faker->address(),
            "password" => bcrypt('123'),
            "pegawai_jasa" => $jasa[$this->faker->numberBetween(0,4)],
            "pegawai_saldo" => $saldo,
            "pegawai_deskripsi" => $this->faker->text($maxNbChars = 255),
        ];
    }
}
