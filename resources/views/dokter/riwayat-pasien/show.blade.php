<x-layouts.app title="Detail Riwayat Pasien">

    {{-- ================= PAGE HEADER ================= --}}
    <div class="flex items-center justify-between mb-8">

        <div class="flex items-center gap-4">

            {{-- Back Button --}}
            <a
                href="{{ route('riwayat-pasien.index') }}"
                class="
                    w-11 h-11 rounded-2xl
                    flex items-center justify-center
                    bg-white border border-slate-200
                    text-slate-500
                    hover:bg-slate-50
                    hover:text-slate-700
                    transition-all duration-200
                    shadow-sm
                ">

                <i class="fas fa-arrow-left text-sm"></i>

            </a>


            {{-- Title --}}
            <div>

                <h1 class="text-2xl font-bold text-slate-800">
                    Detail Riwayat Pasien
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Informasi lengkap hasil pemeriksaan pasien
                </p>

            </div>

        </div>

    </div>


    {{-- ================= MAIN CONTENT ================= --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- ================= LEFT CONTENT ================= --}}
        <div class="xl:col-span-2 flex flex-col gap-6">

            {{-- ================= INFORMASI PASIEN ================= --}}
            <div
                class="
                    overflow-hidden
                    rounded-[28px]
                    border border-slate-200/70
                    bg-white
                    shadow-sm
                ">

                {{-- Card Header --}}
                <div
                    class="
                        px-7 py-5
                        border-b border-slate-100
                        bg-slate-50/50
                    ">

                    <div class="flex items-center gap-4">

                        <div
                            class="
                                w-14 h-14 rounded-2xl
                                bg-gradient-to-br from-cyan-500 to-blue-600
                                flex items-center justify-center
                                shadow-lg shadow-cyan-500/20
                            ">

                            <i class="fas fa-user text-white text-lg"></i>

                        </div>

                        <div>

                            <h2 class="text-lg font-bold text-slate-800">
                                Informasi Pasien
                            </h2>

                            <p class="text-sm text-slate-500 mt-1">
                                Detail data pasien dan pemeriksaan
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Card Body --}}
                <div class="p-7">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Nama --}}
                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400 mb-2">
                                Nama Pasien
                            </p>

                            <p class="font-semibold text-slate-800">
                                {{ $periksa->daftarPoli->pasien->nama }}
                            </p>

                        </div>


                        {{-- Antrian --}}
                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400 mb-2">
                                No Antrian
                            </p>

                            <span
                                class="
                                    inline-flex items-center justify-center
                                    min-w-[50px] h-10 px-4
                                    rounded-xl
                                    bg-cyan-50
                                    text-cyan-700
                                    font-bold text-sm
                                ">

                                {{ $periksa->daftarPoli->no_antrian }}

                            </span>

                        </div>


                        {{-- Poli --}}
                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400 mb-2">
                                Poli
                            </p>

                            <p class="font-semibold text-slate-700">
                                {{ optional($periksa->daftarPoli->jadwalPeriksa->dokter->poli)->nama_poli }}
                            </p>

                        </div>


                        {{-- Dokter --}}
                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400 mb-2">
                                Dokter
                            </p>

                            <p class="font-semibold text-slate-700">
                                {{ $periksa->daftarPoli->jadwalPeriksa->dokter->nama }}
                            </p>

                        </div>


                        {{-- Tanggal --}}
                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400 mb-2">
                                Tanggal Periksa
                            </p>

                            <p class="font-semibold text-slate-700">
                                {{ \Carbon\Carbon::parse($periksa->tgl_periksa)->format('d M Y • H:i') }}
                            </p>

                        </div>

                    </div>


                    {{-- Keluhan --}}
                    <div class="mt-8">

                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400 mb-3">
                            Keluhan Pasien
                        </p>

                        <div
                            class="
                                p-5 rounded-2xl
                                border border-slate-100
                                bg-slate-50
                            ">

                            <p class="text-sm leading-relaxed text-slate-600">

                                {{ $periksa->daftarPoli->keluhan }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================= CATATAN DOKTER ================= --}}
            <div
                class="
                    overflow-hidden
                    rounded-[28px]
                    border border-slate-200/70
                    bg-white
                    shadow-sm
                ">

                {{-- Header --}}
                <div
                    class="
                        px-7 py-5
                        border-b border-slate-100
                        bg-slate-50/50
                    ">

                    <div class="flex items-center gap-3">

                        <div
                            class="
                                w-12 h-12 rounded-2xl
                                bg-amber-100
                                text-amber-600
                                flex items-center justify-center
                            ">

                            <i class="fas fa-notes-medical"></i>

                        </div>

                        <div>

                            <h2 class="font-bold text-slate-800">
                                Catatan Dokter
                            </h2>

                            <p class="text-sm text-slate-500 mt-1">
                                Catatan hasil pemeriksaan pasien
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Body --}}
                <div class="p-7">

                    <div
                        class="
                            rounded-2xl
                            border border-slate-100
                            bg-slate-50
                            p-5
                        ">

                        <p class="text-sm leading-relaxed text-slate-600">

                            {{ $periksa->catatan ?: 'Tidak ada catatan pemeriksaan.' }}

                        </p>

                    </div>

                </div>

            </div>


            {{-- ================= OBAT ================= --}}
            <div
                class="
                    overflow-hidden
                    rounded-[28px]
                    border border-slate-200/70
                    bg-white
                    shadow-sm
                ">

                {{-- Header --}}
                <div
                    class="
                        px-7 py-5
                        border-b border-slate-100
                        bg-slate-50/50
                    ">

                    <div class="flex items-center gap-3">

                        <div
                            class="
                                w-12 h-12 rounded-2xl
                                bg-emerald-100
                                text-emerald-600
                                flex items-center justify-center
                            ">

                            <i class="fas fa-capsules"></i>

                        </div>

                        <div>

                            <h2 class="font-bold text-slate-800">
                                Obat Diresepkan
                            </h2>

                            <p class="text-sm text-slate-500 mt-1">
                                Daftar obat hasil pemeriksaan
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Body --}}
                <div class="overflow-x-auto">

                    @if($periksa->detailPeriksas && $periksa->detailPeriksas->count() > 0)

                        <table class="w-full">

                            <thead
                                class="
                                    bg-slate-50/80
                                    border-b border-slate-100
                                ">

                                <tr>

                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                                        #
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                                        Nama Obat
                                    </th>

                                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                                        Harga
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-slate-100">

                                @foreach($periksa->detailPeriksas as $index => $detail)

                                    <tr class="hover:bg-slate-50/70 transition-all duration-200">

                                        <td class="px-6 py-5 text-slate-500 font-medium">
                                            {{ $index + 1 }}
                                        </td>

                                        <td class="px-6 py-5">

                                            <div class="flex items-center gap-3">

                                                <div
                                                    class="
                                                        w-10 h-10 rounded-xl
                                                        bg-emerald-50
                                                        text-emerald-600
                                                        flex items-center justify-center
                                                    ">

                                                    <i class="fas fa-pills text-sm"></i>

                                                </div>

                                                <span class="font-semibold text-slate-700">
                                                    {{ $detail->obat->nama_obat }}
                                                </span>

                                            </div>

                                        </td>

                                        <td class="px-6 py-5">

                                            <span class="font-bold text-emerald-600">
                                                Rp {{ number_format($detail->obat->harga, 0, ',', '.') }}
                                            </span>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    @else

                        {{-- Empty --}}
                        <div class="py-16 px-6 text-center">

                            <div
                                class="
                                    w-20 h-20 rounded-full
                                    bg-slate-100
                                    flex items-center justify-center
                                    mx-auto mb-5
                                ">

                                <i class="fas fa-capsules text-3xl text-slate-400"></i>

                            </div>

                            <h3 class="text-lg font-semibold text-slate-700">
                                Tidak Ada Obat
                            </h3>

                            <p class="text-sm text-slate-500 mt-2">
                                Tidak ada obat yang diresepkan pada pemeriksaan ini.
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- ================= RIGHT SIDEBAR ================= --}}
        <div class="flex flex-col gap-6">

            {{-- Total Biaya --}}
            <div
                class="
                    overflow-hidden
                    rounded-[28px]
                    border border-cyan-100
                    bg-gradient-to-br from-cyan-500 to-blue-600
                    shadow-lg shadow-cyan-500/20
                ">

                <div class="p-7 text-white">

                    <div
                        class="
                            w-14 h-14 rounded-2xl
                            bg-white/20
                            flex items-center justify-center
                            mb-6
                        ">

                        <i class="fas fa-wallet text-xl"></i>

                    </div>

                    <p class="text-sm text-cyan-100 font-medium">
                        Total Biaya Pemeriksaan
                    </p>

                    <h2 class="text-3xl font-bold mt-3 leading-tight">

                        Rp {{ number_format($periksa->biaya_periksa, 0, ',', '.') }}

                    </h2>

                    <div
                        class="
                            mt-6 pt-6
                            border-t border-white/20
                        ">

                        <p class="text-sm text-cyan-100 leading-relaxed">
                            Total biaya termasuk seluruh obat dan biaya pemeriksaan pasien.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-layouts.app>