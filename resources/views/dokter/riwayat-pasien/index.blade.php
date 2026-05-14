<x-layouts.app title="Riwayat Pasien">

    {{-- ================= PAGE HEADER ================= --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-8">

        {{-- Title --}}
        <div>

            <div class="flex items-center gap-4">

                {{-- Icon --}}
                <div
                    class="
                        w-14 h-14 rounded-2xl
                        bg-gradient-to-br from-cyan-500 to-blue-600
                        flex items-center justify-center
                        shadow-lg shadow-cyan-500/20
                    ">

                    <i class="fas fa-clock-rotate-left text-white text-lg"></i>

                </div>


                {{-- Text --}}
                <div>

                    <h1 class="text-2xl font-bold text-slate-800">
                        Riwayat Pasien
                    </h1>

                    <p class="text-sm text-slate-500 mt-1">
                        Data riwayat pemeriksaan pasien klinik
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- ================= TABLE CARD ================= --}}
    <div
        class="
            overflow-hidden
            rounded-[28px]
            border border-slate-200/70
            bg-white
            shadow-sm
        ">

        {{-- ================= CARD HEADER ================= --}}
        <div
            class="
                flex flex-col lg:flex-row
                lg:items-center lg:justify-between
                gap-4
                px-6 py-5
                border-b border-slate-100
            ">

            <div>

                <h2 class="font-semibold text-slate-800">
                    Data Riwayat Pemeriksaan
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Total {{ $riwayatPasien->count() }} riwayat pemeriksaan pasien
                </p>

            </div>

        </div>


        {{-- ================= TABLE ================= --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[1100px]">

                {{-- ================= TABLE HEAD ================= --}}
                <thead
                    class="
                        bg-slate-50/80
                        border-b border-slate-100
                    ">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            No Antrian
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Nama Pasien
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Keluhan
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Tanggal Periksa
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Biaya
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Aksi
                        </th>

                    </tr>

                </thead>


                {{-- ================= TABLE BODY ================= --}}
                <tbody class="divide-y divide-slate-100">

                    @forelse($riwayatPasien as $riwayat)

                        <tr class="hover:bg-slate-50/70 transition-all duration-200">

                            {{-- No Antrian --}}
                            <td class="px-6 py-5">

                                <span
                                    class="
                                        inline-flex items-center justify-center
                                        min-w-[48px] h-10 px-3
                                        rounded-xl
                                        bg-cyan-50
                                        text-cyan-700
                                        text-sm font-bold
                                    ">

                                    {{ $riwayat->daftarPoli->no_antrian }}

                                </span>

                            </td>


                            {{-- Nama Pasien --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    {{-- Avatar --}}
                                    <div
                                        class="
                                            w-12 h-12 rounded-2xl
                                            bg-gradient-to-br from-cyan-500 to-blue-600
                                            flex items-center justify-center
                                            text-white
                                            shadow-lg shadow-cyan-500/10
                                        ">

                                        <i class="fas fa-user text-sm"></i>

                                    </div>


                                    {{-- Name --}}
                                    <div>

                                        <p class="font-semibold text-slate-800">
                                            {{ $riwayat->daftarPoli->pasien->nama }}
                                        </p>

                                        <p class="text-xs text-slate-400 mt-0.5">
                                            Pasien Klinik
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- Keluhan --}}
                            <td class="px-6 py-5">

                                <p class="text-sm text-slate-600 leading-relaxed max-w-md">

                                    {{ $riwayat->daftarPoli->keluhan }}

                                </p>

                            </td>


                            {{-- Tanggal --}}
                            <td class="px-6 py-5">

                                <div class="flex flex-col">

                                    <span class="font-semibold text-slate-700">
                                        {{ \Carbon\Carbon::parse($riwayat->tgl_periksa)->format('d M Y') }}
                                    </span>

                                    <span class="text-xs text-slate-400 mt-1">
                                        Pemeriksaan Pasien
                                    </span>

                                </div>

                            </td>


                            {{-- Biaya --}}
                            <td class="px-6 py-5">

                                <span class="font-bold text-emerald-600">

                                    Rp {{ number_format($riwayat->biaya_periksa, 0, ',', '.') }}

                                </span>

                            </td>


                            {{-- Action --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center justify-end">

                                    <a
                                        href="{{ route('riwayat-pasien.show', $riwayat->id) }}"
                                        class="
                                            inline-flex items-center gap-2
                                            h-10 px-4 rounded-xl
                                            bg-cyan-50
                                            hover:bg-cyan-100
                                            text-cyan-700
                                            text-sm font-semibold
                                            transition-all duration-200
                                        ">

                                        <i class="fas fa-eye text-xs"></i>

                                        Detail

                                    </a>

                                </div>

                            </td>

                        </tr>

                    @empty

                        {{-- ================= EMPTY STATE ================= --}}
                        <tr>

                            <td colspan="6" class="py-20">

                                <div class="flex flex-col items-center justify-center text-center">

                                    <div
                                        class="
                                            w-20 h-20 rounded-full
                                            bg-slate-100
                                            flex items-center justify-center
                                            mb-5
                                        ">

                                        <i class="fas fa-folder-open text-3xl text-slate-400"></i>

                                    </div>

                                    <h3 class="text-lg font-semibold text-slate-700">
                                        Belum Ada Riwayat
                                    </h3>

                                    <p class="text-sm text-slate-500 mt-2 max-w-sm">
                                        Saat ini belum ada riwayat pemeriksaan pasien yang tersedia.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-layouts.app>