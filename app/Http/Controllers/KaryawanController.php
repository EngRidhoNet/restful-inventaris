<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
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
        return response()->json($karyawan, 201);
    }

    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
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
        return response()->json($karyawan);
    }

    public function destroy($id)
    {
        Karyawan::findOrFail($id)->delete();
        return response()->json('Deleted successfully', 200);
    }
}
