<?php

namespace App\Http\Controllers;

use App\Models\Parkir;
use App\Models\Pengguna;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class ParkirController extends Controller
{
    public function index()
    {
        $data = Parkir::with('pengguna','kendaraan')->get();
        return view('parkir.index', compact('data'));
    }

    public function create()
    {
        $pengguna = Pengguna::all();
        $kendaraan = Kendaraan::all();
        return view('parkir.create', compact('pengguna','kendaraan'));
    }

    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'pengguna_id' => 'required',
            'kendaraan_id' => 'required',
            'lokasi' => 'required'
        ]);

        // SIMPAN DATA (JANGAN PAKAI all())
        Parkir::create([
            'pengguna_id' => $request->pengguna_id,
            'kendaraan_id' => $request->kendaraan_id,
            'lokasi' => $request->lokasi,
        ]);

        return redirect('/parkir')->with('success','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $parkir = Parkir::findOrFail($id);
        $pengguna = Pengguna::all();
        $kendaraan = Kendaraan::all();
        return view('parkir.edit', compact('parkir','pengguna','kendaraan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pengguna_id' => 'required',
            'kendaraan_id' => 'required',
            'lokasi' => 'required'
        ]);

        $parkir = Parkir::findOrFail($id);

        $parkir->update([
            'pengguna_id' => $request->pengguna_id,
            'kendaraan_id' => $request->kendaraan_id,
            'lokasi' => $request->lokasi,
        ]);

        return redirect('/parkir')->with('success','Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Parkir::destroy($id);
        return redirect('/parkir')->with('success','Data berhasil dihapus');
    }
}