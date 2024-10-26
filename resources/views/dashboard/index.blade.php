@extends('partials.base')
@section('title', 'Dashboard')
@section('content')
<h1 class="mt-4">Dashboard</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Dashboard</li>
</ol>
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Jumlah Pegawai
                <h2>{{ $jumlahPegawai }}</h2>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Rata-Rata Gaji
                <h2>{{ number_format($rataRataGaji, 2, ',', '.') }}</h2>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Jumlah Posisi Pegawai
                <h2>{{ $jumlahPosisi }}</h2>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">Jumlah Status Pegawai
                <h2>{{ $jumlahStatus }}</h2>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Data Pertumbuhan Pegawai
            </div>
            <div class="card-body"><canvas id="myLineChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-pie me-1"></i>
                Rata-Rata Status Pegawai
            </div>
            <div class="card-body"><canvas id="myPieChart" width="100%" height="40"></canvas></div>
        </div>
    </div>
</div>
<script>
    // Data dari controller yang disediakan untuk digunakan di JavaScript
    window.chartDatas = {
        labels: <?php echo json_encode($labels); ?>,
        datas: <?php echo json_encode($datas); ?>
    };

    // Data dari controller yang disediakan untuk digunakan di JavaScript
    window.chartData = {
        label: <?php echo json_encode($label); ?>,
        data: <?php echo json_encode($data); ?>
    };
</script>
@endsection