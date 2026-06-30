<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use App\Models\DetailPeriksa;
use App\Models\Obat;
use App\Models\Periksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriksaPasienController extends Controller
{
    public function index()
    {
        $dokterId = Auth::id();

        $daftarPasien = DaftarPoli::with(['pasien', 'jadwalPeriksa', 'periksas'])
            ->whereHas('jadwalPeriksa', function ($query) use ($dokterId) {
                $query->where('id_dokter', $dokterId);
            })
            ->orderBy('no_antrian')
            ->get();

        return view('dokter.periksa-pasien.index', compact('daftarPasien'));
    }

    public function create($id)
    {
        $obats = Obat::all();
        return view('dokter.periksa-pasien.create', compact('obats', 'id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'obat_json' => 'required',
            'catatan' => 'nullable|string',
            'biaya_periksa' => 'required|integer',
        ]);

        $obatIds = json_decode($request->obat_json, true);

        // ===== VALIDASI STOK SEBELUM SIMPAN =====
        foreach ($obatIds as $idObat) {
            $obat = Obat::findOrFail($idObat);

            if ($obat->stok <= 0) {
                return redirect()->back()
                    ->with('error', 'Stok obat "' . $obat->nama_obat . '" sudah habis! Tidak dapat membuat resep.')
                    ->withInput();
            }
        }

        // ===== SIMPAN DATA PERIKSA =====
        $periksa = Periksa::create([
            'id_daftar_poli' => $request->id_daftar_poli,
            'tgl_periksa' => now(),
            'catatan' => $request->catatan,
            'biaya_periksa' => $request->biaya_periksa + 150000,
        ]);

        // ===== SIMPAN DETAIL & KURANGI STOK OTOMATIS =====
        foreach ($obatIds as $idObat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $idObat,
            ]);

            // Kurangi stok otomatis
            $obat = Obat::findOrFail($idObat);
            $obat->stok -= 1;
            $obat->save();
        }

        return redirect()->route('periksa-pasien.index')
            ->with('success', 'Data periksa berhasil disimpan.');
    }
}