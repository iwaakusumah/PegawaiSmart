@extends('partials.base')

@section('title', 'Edit Pegawai')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4">Edit Pegawai</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Data Pegawai</a></li>
            <li class="breadcrumb-item active">Edit Pegawai</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form id="editForm" action="{{ route('employees.update', $employee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $employee->nama }}">
                        <div id="namaError" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="posisi" class="form-label">Posisi</label>
                        <select class="form-control" id="posisi" name="posisi">
                            <option value="">Pilih Posisi</option>
                            <option value="Software Developer" {{ $employee->posisi == 'Software Developer' ? 'selected' : '' }}>Software Developer</option>
                            <option value="Graphic Designer" {{ $employee->posisi == 'Graphic Designer' ? 'selected' : '' }}>Graphic Designer</option>
                            <option value="Accountant" {{ $employee->posisi == 'Accountant' ? 'selected' : '' }}>Accountant</option>
                            <option value="Human Resource" {{ $employee->posisi == 'Human Resource' ? 'selected' : '' }}>Human Resource</option>
                            <option value="Sales" {{ $employee->posisi == 'Sales' ? 'selected' : '' }}>Sales</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $employee->email }}">
                        <div id="emailError" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="" disabled selected>{{ $employee->status }}</option>
                            @foreach (App\Enums\EmployeeStatus::cases() as $status)
                            <option value="{{ $status->value }}" {{ $employee->status == $status->value ? 'selected' : '' }}>
                                {{ $status->value }}
                            </option>
                            @endforeach
                        </select>
                        <div id="statusError" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="gaji" class="form-label">Gaji</label>
                        <input type="text" class="form-control" id="gaji" name="gaji" value="{{ $employee->gaji }}">
                        <div id="gajiError" class="invalid-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ $employee->tanggal_masuk }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                        <input type="date" class="form-control" id="tanggal_keluar" name="tanggal_keluar" value="{{ $employee->tanggal_keluar }}">
                    </div>
                    <button type="button" class="btn btn-success" id="submitForm">Simpan</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection