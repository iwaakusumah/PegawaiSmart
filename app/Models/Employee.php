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
        'jabatan',
        'status',
        'gaji',
        'tanggal_masuk',
    ];

    protected $casts = [
        'status' => EmployeeStatus::class,
    ];
}