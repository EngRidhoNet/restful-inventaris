<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        // Menampilkan semua barang beserta relasi kategori dan peminjaman
        $barang = Barang::with(['kategori', 'peminjaman'])->get();
        return response()->json($barang);
    }

    public function store(Request $request)
    {
        $barang = Barang::create($request->all());
        // Menampilkan barang yang baru dibuat beserta relasinya
        $barang->load(['kategori', 'peminjaman']);
        return response()->json($barang, 201);
    }

    public function show($id)
    {
        // Menampilkan barang berdasarkan id beserta relasi kategori dan peminjaman
        $barang = Barang::with(['kategori', 'peminjaman'])->find($id);

        if (!$barang) {
            return response()->json(['message' => 'Barang not found'], 404);
        }

        return response()->json($barang);
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->update($request->all());
        // Menampilkan barang yang diperbarui beserta relasinya
        $barang->load(['kategori', 'peminjaman']);
        return response()->json($barang);
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
