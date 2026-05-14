<x-layouts.app title="Data Dokter">

    {{-- ================= PAGE HEADER ================= --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-8">

        {{-- Title --}}
        <div>

            <div class="flex items-center gap-3">

                <div
                    class="
                        w-12 h-12 rounded-2xl
                        bg-gradient-to-br from-cyan-400 to-blue-500
                        flex items-center justify-center
                        shadow-lg shadow-cyan-500/20
                    ">

                    <i class="fas fa-user-doctor text-white text-lg"></i>

                </div>

                <div>

                    <h1 class="text-2xl font-bold text-slate-800">
                        Data Dokter
                    </h1>

                    <p class="text-sm text-slate-500 mt-0.5">
                        Kelola data dokter dan informasi tenaga medis
                    </p>

                </div>

            </div>

        </div>


        {{-- Add Button --}}
        <a
            href="{{ route('dokter.create') }}"
            class="
                inline-flex items-center justify-center gap-2
                px-5 h-12 rounded-2xl
                bg-gradient-to-r from-cyan-500 to-blue-600
                hover:from-cyan-600 hover:to-blue-700
                text-white font-semibold text-sm
                shadow-lg shadow-cyan-500/20
                transition-all duration-300
                hover:-translate-y-0.5
            ">

            <i class="fas fa-plus text-sm"></i>

            Tambah Dokter

        </a>

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

        {{-- Card Header --}}
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
                    Daftar Dokter
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Total {{ $dokters->count() }} dokter terdaftar
                </p>

            </div>

        </div>


        {{-- ================= TABLE ================= --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[1100px]">

                {{-- Table Head --}}
                <thead
                    class="
                        bg-slate-50/80
                        border-b border-slate-100
                    ">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Dokter
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Email
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            No. KTP
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            No. HP
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Alamat
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Poli
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Aksi
                        </th>

                    </tr>

                </thead>


                {{-- Table Body --}}
                <tbody class="divide-y divide-slate-100">

                    @forelse($dokters as $dokter)

                        <tr class="hover:bg-slate-50/70 transition-all duration-200">

                            {{-- Dokter --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    {{-- Avatar --}}
                                    <div
                                        class="
                                            w-12 h-12 rounded-2xl
                                            bg-gradient-to-br from-cyan-400 to-blue-500
                                            flex items-center justify-center
                                            text-white font-bold
                                            shadow-lg shadow-cyan-500/10
                                        ">

                                        {{ strtoupper(substr($dokter->nama, 0, 1)) }}

                                    </div>

                                    {{-- Info --}}
                                    <div>

                                        <p class="font-semibold text-slate-800">
                                            {{ $dokter->nama }}
                                        </p>

                                        <p class="text-xs text-slate-400 mt-0.5">
                                            Dokter Klinik
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- Email --}}
                            <td class="px-6 py-5">

                                <p class="text-sm text-slate-600">
                                    {{ $dokter->email }}
                                </p>

                            </td>


                            {{-- KTP --}}
                            <td class="px-6 py-5">

                                <p class="text-sm text-slate-600">
                                    {{ $dokter->no_ktp ?? '-' }}
                                </p>

                            </td>


                            {{-- HP --}}
                            <td class="px-6 py-5">

                                <p class="text-sm text-slate-600">
                                    {{ $dokter->no_hp ?? '-' }}
                                </p>

                            </td>


                            {{-- Alamat --}}
                            <td class="px-6 py-5 max-w-[240px]">

                                <p class="text-sm text-slate-600 line-clamp-2">
                                    {{ $dokter->alamat ?? '-' }}
                                </p>

                            </td>


                            {{-- Poli --}}
                            <td class="px-6 py-5">

                                <span
                                    class="
                                        inline-flex items-center gap-2
                                        px-3 py-1.5 rounded-full
                                        bg-cyan-50
                                        text-cyan-700
                                        text-xs font-semibold
                                    ">

                                    <span class="w-2 h-2 rounded-full bg-cyan-500"></span>

                                    {{ optional($dokter->poli)->nama_poli ?? 'Belum Dipilih' }}

                                </span>

                            </td>


                            {{-- Action --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center justify-end gap-2">

                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('dokter.edit', $dokter->id) }}"
                                        class="
                                            inline-flex items-center gap-2
                                            h-10 px-4 rounded-xl
                                            bg-amber-50
                                            hover:bg-amber-100
                                            text-amber-600
                                            text-sm font-semibold
                                            transition-all duration-200
                                        ">

                                        <i class="fas fa-pen-to-square text-xs"></i>

                                        Edit

                                    </a>


                                    {{-- Delete --}}
                                    <form
                                        action="{{ route('dokter.destroy', $dokter->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            onclick="return confirm('Yakin ingin menghapus dokter ini?')"
                                            class="
                                                inline-flex items-center gap-2
                                                h-10 px-4 rounded-xl
                                                bg-red-50
                                                hover:bg-red-100
                                                text-red-600
                                                text-sm font-semibold
                                                transition-all duration-200
                                            ">

                                            <i class="fas fa-trash text-xs"></i>

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        {{-- Empty State --}}
                        <tr>

                            <td colspan="7" class="py-20">

                                <div class="flex flex-col items-center justify-center text-center">

                                    <div
                                        class="
                                            w-20 h-20 rounded-full
                                            bg-slate-100
                                            flex items-center justify-center
                                            mb-5
                                        ">

                                        <i class="fas fa-user-doctor text-3xl text-slate-400"></i>

                                    </div>

                                    <h3 class="text-lg font-semibold text-slate-700">
                                        Belum Ada Data Dokter
                                    </h3>

                                    <p class="text-sm text-slate-500 mt-2 max-w-sm">
                                        Saat ini belum terdapat data dokter yang tersedia pada sistem.
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