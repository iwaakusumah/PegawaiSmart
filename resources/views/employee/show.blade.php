@extends('partials.base')

@section('title', 'Detail Pegawai')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Detail Pegawai</h3>
        </div>
        <div class="card-body">
            <p class="card-text"><strong>Nama:</strong> {{ $employee->nama }}</p>
            <p class="card-text"><strong>Posisi:</strong> {{ $employee->posisi }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $employee->status }}</p>
            <p class="card-text"><strong>Gaji:</strong> Rp. {{ number_format($employee->gaji, 2, ',', '.')}}</p>
            <p class="card-text"><strong>Tanggal Masuk:</strong> {{ $employee->tanggal_masuk }}</p>
            <p class="card-text"><strong>Tanggal Keluar:</strong> {{ $employee->tanggal_keluar }}</p>
            <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection