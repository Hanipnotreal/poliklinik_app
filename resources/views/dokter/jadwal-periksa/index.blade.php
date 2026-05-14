<x-layouts.app title="Jadwal Periksa">

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

                    <i class="fas fa-calendar-check text-white text-lg"></i>

                </div>


                {{-- Text --}}
                <div>

                    <h1 class="text-2xl font-bold text-slate-800">
                        Jadwal Periksa
                    </h1>

                    <p class="text-sm text-slate-500 mt-1">
                        Kelola jadwal pemeriksaan dokter
                    </p>

                </div>

            </div>

        </div>


        {{-- Add Button --}}
        <a
            href="{{ route('jadwal-periksa.create') }}"
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

            Tambah Jadwal

        </a>

    </div>


    {{-- ================= SUCCESS ALERT ================= --}}
    @if (session('message'))

        <div
            id="successAlert"
            class="
                mb-6
                flex items-center gap-3
                px-5 py-4
                rounded-2xl
                border border-emerald-100
                bg-emerald-50
                text-emerald-700
            ">

            <div
                class="
                    w-10 h-10 rounded-xl
                    bg-emerald-500
                    flex items-center justify-center
                    text-white
                ">

                <i class="fas fa-check"></i>

            </div>

            <div>

                <p class="font-semibold">
                    Berhasil
                </p>

                <p class="text-sm">
                    {{ session('message') }}
                </p>

            </div>

        </div>

    @endif


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
                    Daftar Jadwal Periksa
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Total {{ $jadwalPeriksas->count() }} jadwal tersedia
                </p>

            </div>

        </div>


        {{-- ================= TABLE ================= --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[800px]">

                {{-- Table Head --}}
                <thead
                    class="
                        bg-slate-50/80
                        border-b border-slate-100
                    ">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            ID
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Hari
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Jam Mulai
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Jam Selesai
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Aksi
                        </th>

                    </tr>

                </thead>


                {{-- ================= TABLE BODY ================= --}}
                <tbody class="divide-y divide-slate-100">

                    @forelse ($jadwalPeriksas as $jadwalPeriksa)

                        <tr class="hover:bg-slate-50/70 transition-all duration-200">

                            {{-- ID --}}
                            <td class="px-6 py-5 text-slate-500 font-medium">

                                #{{ $jadwalPeriksa->id }}

                            </td>


                            {{-- Hari --}}
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

                                    {{ $jadwalPeriksa->hari }}

                                </span>

                            </td>


                            {{-- Jam Mulai --}}
                            <td class="px-6 py-5 text-slate-700 font-medium">

                                {{ \Carbon\Carbon::parse($jadwalPeriksa->jam_mulai)->format('H:i') }}

                            </td>


                            {{-- Jam Selesai --}}
                            <td class="px-6 py-5 text-slate-700 font-medium">

                                {{ \Carbon\Carbon::parse($jadwalPeriksa->jam_selesai)->format('H:i') }}

                            </td>


                            {{-- Action --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center justify-end gap-2">

                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('jadwal-periksa.edit', $jadwalPeriksa->id) }}"
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
                                        action="{{ route('jadwal-periksa.destroy', $jadwalPeriksa->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            onclick="return confirm('Yakin ingin menghapus jadwal ini?')"
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

                            <td colspan="5" class="py-20">

                                <div class="flex flex-col items-center justify-center text-center">

                                    <div
                                        class="
                                            w-20 h-20 rounded-full
                                            bg-slate-100
                                            flex items-center justify-center
                                            mb-5
                                        ">

                                        <i class="fas fa-calendar-xmark text-3xl text-slate-400"></i>

                                    </div>

                                    <h3 class="text-lg font-semibold text-slate-700">
                                        Belum Ada Jadwal Periksa
                                    </h3>

                                    <p class="text-sm text-slate-500 mt-2 max-w-sm">
                                        Saat ini belum terdapat jadwal pemeriksaan dokter.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- ================= AUTO CLOSE ALERT ================= --}}
    <script>

        setTimeout(() => {

            const alert = document.getElementById('successAlert')

            if(alert){

                alert.style.transition = "all 0.4s ease"
                alert.style.opacity = "0"
                alert.style.transform = "translateY(-10px)"

                setTimeout(() => {
                    alert.remove()
                }, 400)

            }

        }, 2500)

    </script>

</x-layouts.app>