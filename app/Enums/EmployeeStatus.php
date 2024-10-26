<?php

namespace App\Enums;

enum EmployeeStatus: string {
    case Tetap = 'Tetap';
    case Kontrak = 'Kontrak';
    case Magang = 'Magang';
    case Resign = 'Resign';
    case Pensiun = 'Pensiun';
    case Layoff = 'Layoff';
}