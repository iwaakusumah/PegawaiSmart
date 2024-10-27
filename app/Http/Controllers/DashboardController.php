<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data sesi berdasarkan tanggal_masuk dan tanggal_keluar
        $yearCountsMasuk = DB::table('employees')
            ->select(DB::raw('YEAR(tanggal_masuk) as year'), DB::raw('count(*) as count'))
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->pluck('count', 'year')
            ->toArray();

        $yearCountsKeluar = DB::table('employees')
            ->select(DB::raw('YEAR(tanggal_keluar) as year'), DB::raw('count(*) as count'))
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->pluck('count', 'year')
            ->toArray();

        // Menggabungkan data tahun dan memastikan kedua dataset memiliki tahun yang sama
        $years = array_unique(array_merge(array_keys($yearCountsMasuk), array_keys($yearCountsKeluar)));

        // Ambil 5 tahun terakhir
        $recentYears = array_slice(array_reverse($years), 0, 5);

        $datasMasuk = [];
        $datasKeluar = [];

        foreach ($recentYears as $year) {
            $datasMasuk[$year] = $yearCountsMasuk[$year] ?? 0; // Gunakan 0 jika tidak ada data
            $datasKeluar[$year] = $yearCountsKeluar[$year] ?? 0; // Gunakan 0 jika tidak ada data
        }

        // Data untuk chart areas
        $labels = array_keys($datasMasuk); // Tahun
        $datasMasuk = array_values($datasMasuk); // Data jumlah masuk
        $datasKeluar = array_values($datasKeluar); // Data jumlah keluar

        // Balikkan urutan label dan data
        $labels = array_reverse($labels);
        $datasMasuk = array_reverse($datasMasuk);
        $datasKeluar = array_reverse($datasKeluar);

        // Mengambil data jumlah pegawai berdasarkan status
        $statusCounts = DB::table('employees')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        // Data untuk chart pie
        $label = array_keys($statusCounts);
        $data = array_values($statusCounts);

        // Menghitung jumlah pegawai
        $jumlahPegawai = DB::table('employees')->count();

        // Menghitung rata-rata gaji
        $rataRataGaji = DB::table('employees')
            ->whereNotIn('status', ['Layoff', 'Resign', 'Pensiun'])
            ->avg('gaji');

        // Menghitung jumlah posisi unik
        $jumlahPosisi = DB::table('employees')->distinct('posisi')->count('posisi');

        // Menghitung jumlah status unik
        $jumlahStatus = DB::table('employees')->distinct('status')->count('status');

        // Mengirimkan data ke view dashboard.index
        return view('dashboard.index', compact('jumlahPegawai', 'rataRataGaji', 'jumlahPosisi', 'jumlahStatus', 'label', 'data', 'datasMasuk', 'datasKeluar', 'labels'));
    }
}
