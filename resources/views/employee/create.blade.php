@extends('partials.base')

@section('title', 'Tambah Pegawai')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4">Tambah Pegawai</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Data Pegawai</a></li>
            <li class="breadcrumb-item active">Tambah Pegawai</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <form id="employeeForm">
                    @csrf
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select class="form-control" id="jabatan" name="jabatan">
                            <option value="">Pilih Jabatan</option>
                            <option value="Software Developer">Software Developer</option>
                            <option value="Graphic Designer">Graphic Designer</option>
                            <option value="Accountant">Accountant</option>
                            <option value="Human Resource">Human Resource</option>
                            <option value="Sales">Sales</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="">Pilih Status</option>
                            <option value="Tetap">Tetap</option>
                            <option value="Kontrak">Kontrak</option>
                            <option value="Magang">Magang</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gaji" class="form-label">Gaji</label>
                        <input type="text" class="form-control" id="gaji" name="gaji">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
                    </div>
                    <button type="button" class="btn btn-success" onclick="confirmSubmit()">Simpan</button>
                    <a href="{{ route('employees.index') }}" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection