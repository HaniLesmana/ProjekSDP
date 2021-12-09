<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Barang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $harga = $this->faker->numberBetween(20,999)*1000;

        return [
            "barang_nama" => $this->faker->words($nb = 3, $asText = true),
            "barang_harga" => $harga,
            "barang_stok" => $this->faker->numberBetween(0, 20)
        ];
    }
}
