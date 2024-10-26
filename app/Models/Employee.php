<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\EmployeeStatus;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'jabatan',
        'status',
        'gaji',
        'tanggal_masuk',
        'tanggal_keluar',
    ];

    protected $casts = [
        'status' => EmployeeStatus::class,
    ];
}