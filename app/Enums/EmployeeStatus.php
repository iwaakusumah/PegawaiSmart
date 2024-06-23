<?php

namespace App\Enums;

enum EmployeeStatus: string {
    case TETAP = 'Tetap';
    case KONTRAK = 'Kontrak';
    case MAGANG = 'Magang';
}