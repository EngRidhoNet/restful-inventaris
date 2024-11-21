<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        // Menampilkan semua karyawan beserta relasi peminjamannya
        $karyawan = Karyawan::with('peminjamans')->get();
        return response()->json($karyawan);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'departemen' => 'required|string|max:255',
            'kontak' => 'required|string|max:255'
        ]);

        $karyawan = Karyawan::create($validatedData);
        // Menambahkan relasi peminjamans setelah pembuatan
        $karyawan->load('peminjamans');
        return response()->json($karyawan, 201);
    }

    public function show($id)
    {
        // Menampilkan karyawan berdasarkan ID beserta relasi peminjamannya
        $karyawan = Karyawan::with('peminjamans')->find($id);

        if (!$karyawan) {
            return response()->json(['message' => 'Karyawan not found'], 404);
        }

        return response()->json($karyawan);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'departemen' => 'required|string|max:255',
            'kontak' => 'required|string|max:255'
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($validatedData);
        // Menambahkan relasi peminjamans setelah pembaruan
        $karyawan->load('peminjamans');
        return response()->json($karyawan);
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
