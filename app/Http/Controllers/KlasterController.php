<?php

namespace App\Http\Controllers;

use App\Models\Klaster;
use Illuminate\Http\Request;

class KlasterController extends Controller
{
    public function index()
    {
        $klasters = Klaster::orderBy('created_at', 'desc')->get();
        return view('klaster.index', compact('klasters'));
    }

    public function create()
    {
        return view('klaster.form', [
            'klaster' => new Klaster(),
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'pengukuran_ke' => 'required|integer|min:1',
            'desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'bentuk_lahan' => 'nullable|string|max:255',
            'titik_koordinat' => 'nullable|string|max:255',
            'altitude' => 'nullable|string|max:255',
            'tahun_tanam' => 'required|integer',
            'umur' => 'required|numeric',
            'luas_ha' => 'required|numeric',
            'nama_petani' => 'required|string|max:255',
            'jarak_tanam' => 'nullable|string|max:255',
            'pola_tanam' => 'nullable|string|max:255',
            'jenis_tanaman' => 'nullable|string|max:255',
        ]);

        Klaster::create($validated);

        return redirect()->route('klaster.index')->with('success', 'Data klaster berhasil ditambahkan.');
    }

    public function edit(Klaster $klaster)
    {
        return view('klaster.form', [
            'klaster' => $klaster,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, Klaster $klaster)
    {
        $validated = $request->validate([
            'pengukuran_ke' => 'required|integer|min:1',
            'desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'nullable|string|max:255',
            'bentuk_lahan' => 'nullable|string|max:255',
            'titik_koordinat' => 'nullable|string|max:255',
            'altitude' => 'nullable|string|max:255',
            'tahun_tanam' => 'required|integer',
            'umur' => 'required|numeric',
            'luas_ha' => 'required|numeric',
            'nama_petani' => 'required|string|max:255',
            'jarak_tanam' => 'nullable|string|max:255',
            'pola_tanam' => 'nullable|string|max:255',
            'jenis_tanaman' => 'nullable|string|max:255',
        ]);

        $klaster->update($validated);

        return redirect()->route('klaster.index')->with('success', 'Data klaster berhasil diperbarui.');
    }

    public function destroy(Klaster $klaster)
    {
        $klaster->delete();
        return redirect()->route('klaster.index')->with('success', 'Data klaster berhasil dihapus.');
    }
}
