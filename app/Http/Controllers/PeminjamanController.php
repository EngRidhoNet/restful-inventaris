<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();
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
        return response()->json($peminjaman, 201);
    }

    public function show($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
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
        return response()->json($peminjaman);
    }

    public function destroy($id)
    {
        Peminjaman::findOrFail($id)->delete();
        return response()->json('Deleted successfully', 200);
    }
}
