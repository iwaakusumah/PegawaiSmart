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
        // Mengambil data sesi berdasarkan tanggal_masuk
        $yearCounts = DB::table('employees')
            ->select(DB::raw('YEAR(tanggal_masuk) as year'), DB::raw('count(*) as count'))
            ->groupBy('year')
            ->orderBy('year','asc')
            ->pluck('count', 'year')
            ->toArray();

        // Data untuk chart pie
        $labels = array_keys($yearCounts);
        $datas = array_values($yearCounts);

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
        $rataRataGaji = DB::table('employees')->avg('gaji');

        // Menghitung jumlah jabatan unik
        $jumlahJabatan = DB::table('employees')->distinct('jabatan')->count('jabatan');

        // Menghitung jumlah status unik
        $jumlahStatus = DB::table('employees')->distinct('status')->count('status');

        // Mengirimkan data ke view dashboard.index
        return view('dashboard.index', compact('jumlahPegawai', 'rataRataGaji', 'jumlahJabatan', 'jumlahStatus', 'label', 'data', 'datas', 'labels'));
    }
}
