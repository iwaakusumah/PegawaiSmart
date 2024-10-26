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
        $listPosisi = [
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
            'Resign',
            'Layoff',
            'Pensiun'

        ];

        $status = $this->faker->randomElement($listStatus);
        $gaji = ($status === 'Magang')
            ? floor($this->faker->randomFloat(2, 1000000, 4000000) / 1000000) * 1000000 // Gaji untuk statusMagang
            : floor($this->faker->randomFloat(2, 6000000, 20000000) / 1000000) * 1000000; // Gaji untuk status lain

        // Tentukan tanggal masuk
        $tanggalMasuk = $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d');

        // Tentukan tanggal keluar berdasarkan status
        $tanggalKeluar = null;
        if (in_array($status, ['Resign', 'Layoff', 'Pensiun'])) {
            $tanggalKeluar = $this->faker->dateTimeBetween($tanggalMasuk, 'now')->format('Y-m-d');
        } elseif ($status === 'Kontrak') {
            // Untuk status Kontrak, kita bisa menetapkan tanggal keluar setelah tanggal masuk
            $tanggalKeluar = $this->faker->dateTimeBetween($tanggalMasuk, '+1 year')->format('Y-m-d');
        } elseif ($status === 'Magang') {
            // Untuk status Magang, kita bisa menetapkan tanggal keluar dalam rentang 3-6 bulan setelah tanggal masuk
            $tanggalKeluar = $this->faker->dateTimeBetween($tanggalMasuk, '+6 months')->format('Y-m-d');
        }

        return [
            'nama' => $this->faker->name,
            'posisi' => $this->faker->randomElement($listPosisi),
            'email' => $this->faker->unique()->safeEmail,
            'status' => $status,
            'gaji' => $gaji,
            'tanggal_masuk' => $tanggalMasuk,
            'tanggal_keluar' => $tanggalKeluar
        ];
    }
}
