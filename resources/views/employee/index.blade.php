@extends('partials.base')

@section('title', 'Data Pegawai')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h3 class="mt-4">Data Pegawai</h3>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Pegawai</li>
        </ol>

        <!-- Button Tambah Pegawai -->
        <a href="{{ route('employees.create') }}" class="btn btn-success mb-4">Tambah Pegawai</a>

        <!-- Tabel Pegawai -->
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->nama }}</td>
                            <td>{{ $employee->jabatan }}</td>
                            <td>{{ $employee->status }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center">
                                    <!-- Detail Button -->
                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-success waves-effect waves-light my-0 me-1">
                                        <i class="fas fa-eye" style="color: white;"></i>
                                    </a>

                                    <!-- Edit Button -->
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning waves-effect waves-light my-0">
                                        <i class="fas fa-pencil-alt" style="color: white;"></i>
                                    </a>

                                    <!-- Delete Form -->
                                    <form id="deleteForm{{ $employee->id }}" action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="deleteBtn ms-1 me-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger waves-effect waves-light deleteButton">
                                            <i class="fas fa-trash-alt" style="color: white;"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection