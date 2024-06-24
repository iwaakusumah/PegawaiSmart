<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     protected $model = Employee::class;
    public function definition()
    {
        $listJabatan = [
            'Software Developer',
            'Graphic Designer',
            'Accountant',
            'Human Resource',
            'Sales'
        ];

        $listStatus = [
            'Tetap',
            'Kontrak',
            'Magang',
        ];

        return [
            'nama' => $this->faker->name,
            'jabatan' => $this->faker->randomElement($listJabatan),
            'email' => $this->faker->email,
            'status'=> $this->faker->randomElement($listStatus),
            'gaji' => $this->faker->randomFloat(2, 5000000, 20000000),
            'tanggal_masuk' => $this->faker->date(),
        ];
    }
}
