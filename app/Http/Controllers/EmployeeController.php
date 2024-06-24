<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Enums\EmployeeStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Menampilkan Data Pegawai
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }

    /**
     * Menampilkan Data Detail Pegawai
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Menampilkan Form Tambah Pegawai
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Tambah Data Pegawai
     */
    public function store(Request $request)
    {
        // Validasi Data Pegawai
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'status' => ['required', Rule::in([EmployeeStatus::TETAP->value, EmployeeStatus::KONTRAK->value, EmployeeStatus::MAGANG->value])],
            'gaji' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
        ]);

        // Menyimpan Data Pegawai
        $employee = new Employee();
        $employee->nama = $validatedData['nama'];
        $employee->jabatan = $validatedData['jabatan'];
        $employee->email = $validatedData['email'];
        $employee->status = $validatedData['status'];
        $employee->gaji = $validatedData['gaji'];
        $employee->tanggal_masuk = $validatedData['tanggal_masuk'];
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil ditambahkan.');
    }

    /**
     * Menampilkan Form Edit Pegawai
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Edit Data Pegawai
     */
    public function update(Request $request, $id)
    {
        // Validasi Data Pegawai
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $id,
            'status' => ['required', Rule::in([EmployeeStatus::TETAP->value, EmployeeStatus::KONTRAK->value, EmployeeStatus::MAGANG->value])],
            'gaji' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
        ]);

        // Mengupdate Data Pegawai
        $employee = Employee::findOrFail($id);
        $employee->nama = $validatedData['nama'];
        $employee->jabatan = $validatedData['jabatan'];
        $employee->email = $validatedData['email'];
        $employee->status = $validatedData['status'];
        $employee->gaji = $validatedData['gaji'];
        $employee->tanggal_masuk = $validatedData['tanggal_masuk'];
        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil diperbarui.');
    }

    /**
     * Hapus Data Pegawai
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil dihapus.');
    }
}