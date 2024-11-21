<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        // Menampilkan semua peminjaman beserta relasi barang dan karyawan
        $peminjaman = Peminjaman::with(['barang', 'karyawan'])->get();
        return response()->json($peminjaman);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'barang_id' => 'required|exists:barangs,id_barang',
            'karyawan_id' => 'required|exists:karyawans,id_karyawan',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|string'
        ]);

        $peminjaman = Peminjaman::create($validatedData);
        // Menambahkan relasi barang dan karyawan setelah pembuatan
        $peminjaman->load(['barang', 'karyawan']);
        return response()->json($peminjaman, 201);
    }

    public function show($id)
    {
        // Menampilkan peminjaman berdasarkan ID beserta relasi barang dan karyawan
        $peminjaman = Peminjaman::with(['barang', 'karyawan'])->find($id);

        if (!$peminjaman) {
            return response()->json(['message' => 'Peminjaman not found'], 404);
        }

        return response()->json($peminjaman);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'barang_id' => 'required|exists:barangs,id_barang',
            'karyawan_id' => 'required|exists:karyawans,id_karyawan',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'status' => 'required|string'
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($validatedData);
        // Menambahkan relasi barang dan karyawan setelah pembaruan
        $peminjaman->load(['barang', 'karyawan']);
        return response()->json($peminjaman);
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
