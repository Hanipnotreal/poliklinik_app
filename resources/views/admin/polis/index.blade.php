<x-layouts.app title="Data Poli">

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

                    <i class="fas fa-hospital text-white text-lg"></i>

                </div>

                <div>

                    <h1 class="text-2xl font-bold text-slate-800">
                        Data Poli
                    </h1>

                    <p class="text-sm text-slate-500 mt-0.5">
                        Kelola data poli klinik dan layanan kesehatan
                    </p>

                </div>

            </div>

        </div>


        {{-- Add Button --}}
        <a
            href="{{ route('polis.create') }}"
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

            Tambah Poli

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

        {{-- Table Header --}}
        <div
            class="
                flex items-center justify-between
                px-6 py-5
                border-b border-slate-100
            ">

            <div>

                <h2 class="font-semibold text-slate-800">
                    Daftar Poli
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Total {{ $polis->count() }} data poli tersedia
                </p>

            </div>

        </div>


        {{-- ================= TABLE ================= --}}
        <div class="overflow-x-auto">

            <table class="w-full">

                {{-- Table Head --}}
                <thead
                    class="
                        bg-slate-50/80
                        border-b border-slate-100
                    ">

                    <tr>

                        <th
                            class="
                                px-6 py-4
                                text-left
                                text-xs font-bold
                                uppercase tracking-[0.15em]
                                text-slate-500
                            ">

                            Nama Poli

                        </th>

                        <th
                            class="
                                px-6 py-4
                                text-left
                                text-xs font-bold
                                uppercase tracking-[0.15em]
                                text-slate-500
                            ">

                            Keterangan

                        </th>

                        <th
                            class="
                                px-6 py-4
                                text-right
                                text-xs font-bold
                                uppercase tracking-[0.15em]
                                text-slate-500
                            ">

                            Aksi

                        </th>

                    </tr>

                </thead>


                {{-- Table Body --}}
                <tbody class="divide-y divide-slate-100">

                    @forelse($polis as $poli)

                        <tr class="hover:bg-slate-50/70 transition-all duration-200">

                            {{-- Nama Poli --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="
                                            w-11 h-11 rounded-2xl
                                            bg-cyan-50
                                            text-cyan-600
                                            flex items-center justify-center
                                        ">

                                        <i class="fas fa-hospital"></i>

                                    </div>

                                    <div>

                                        <p class="font-semibold text-slate-800">
                                            {{ $poli->nama_poli }}
                                        </p>

                                        <p class="text-xs text-slate-400 mt-0.5">
                                            Poli Klinik
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- Keterangan --}}
                            <td class="px-6 py-5">

                                <p class="text-sm text-slate-600 leading-relaxed">
                                    {{ $poli->keterangan }}
                                </p>

                            </td>


                            {{-- Action --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center justify-end gap-2">

                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('polis.edit', $poli->id) }}"
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
                                        action="{{ route('polis.destroy', $poli->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            onclick="return confirm('Yakin ingin menghapus poli ini?')"
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

                            <td colspan="3" class="py-20">

                                <div class="flex flex-col items-center justify-center text-center">

                                    <div
                                        class="
                                            w-20 h-20 rounded-full
                                            bg-slate-100
                                            flex items-center justify-center
                                            mb-5
                                        ">

                                        <i class="fas fa-inbox text-3xl text-slate-400"></i>

                                    </div>

                                    <h3 class="text-lg font-semibold text-slate-700">
                                        Belum Ada Data Poli
                                    </h3>

                                    <p class="text-sm text-slate-500 mt-2 max-w-sm">
                                        Saat ini belum terdapat data poli yang tersedia pada sistem.
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