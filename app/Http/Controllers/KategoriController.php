<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        // Menampilkan semua kategori beserta barang terkait
        $kategori = Kategori::with('barangs')->get();
        return response()->json($kategori);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string'
        ]);

        $kategori = Kategori::create($validatedData);
        // Menambahkan relasi barang setelah pembuatan
        $kategori->load('barangs');
        return response()->json($kategori, 201);
    }

    public function show($id)
    {
        // Menampilkan kategori berdasarkan ID beserta barang terkait
        $kategori = Kategori::with('barangs')->find($id);

        if (!$kategori) {
            return response()->json(['message' => 'Kategori not found'], 404);
        }

        return response()->json($kategori);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string'
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($validatedData);
        // Menambahkan relasi barang setelah pembaruan
        $kategori->load('barangs');
        return response()->json($kategori);
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
