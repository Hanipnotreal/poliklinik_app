<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarPoli;
use App\Models\JadwalPeriksa;
use Illuminate\Support\Facades\Auth;
use App\Models\Poli;

class DaftarPoliController extends Controller
{

    public function create()
    {
        $polis = Poli::all();
        $jadwals = JadwalPeriksa::with('poli')->get();

        return view('pasien.daftar_poli.create', compact('polis', 'jadwals'));
    }

        // 🔹 SIMPAN
        public function store(Request $request)
    {
        $user = auth()->id();

        // ❌ CEK MASIH ADA ANTRIAN
        $cek = DaftarPoli::where('id_pasien', $user)
            ->whereNull('status_selesai')
            ->exists();

        if ($cek) {
            return back()->with('error', 'Anda masih memiliki antrian aktif!');
        }

        // 🔢 NOMOR ANTRIAN
        $no = DaftarPoli::where('id_jadwal', $request->id_jadwal)->count() + 1;

        DaftarPoli::create([
            'id_pasien' => $user,
            'id_jadwal' => $request->id_jadwal,
            'keluhan' => $request->keluhan,
            'no_antrian' => $no,
        ]);

        return redirect()->route('pasien.daftar.index')
            ->with('success', 'Berhasil daftar! Nomor: '.$no);
    }
}