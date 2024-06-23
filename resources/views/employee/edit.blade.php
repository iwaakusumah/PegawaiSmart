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
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select class="form-control" id="jabatan" name="jabatan">
                            <option value="">Pilih Jabatan</option>
                            <option value="Software Developer" {{ $employee->jabatan == 'Software Developer' ? 'selected' : '' }}>Software Developer</option>
                            <option value="Graphic Designer" {{ $employee->jabatan == 'Graphic Designer' ? 'selected' : '' }}>Graphic Designer</option>
                            <option value="Accountant" {{ $employee->jabatan == 'Accountant' ? 'selected' : '' }}>Accountant</option>
                            <option value="Human Resource" {{ $employee->jabatan == 'Human Resource' ? 'selected' : '' }}>Human Resource</option>
                            <option value="Sales" {{ $employee->jabatan == 'Sales' ? 'selected' : '' }}>Sales</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="">Pilih Status</option>
                            <option value="Tetap" {{ $employee->status == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                            <option value="Kontrak" {{ $employee->status == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                            <option value="Magang" {{ $employee->status == 'Magang' ? 'selected' : '' }}>Magang</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gaji" class="form-label">Gaji</label>
                        <input type="text" class="form-control" id="gaji" name="gaji" value="{{ $employee->gaji }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="{{ $employee->tanggal_masuk }}">
                    </div>
                    <button type="button" class="btn btn-success" id="submitForm">Simpan</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection