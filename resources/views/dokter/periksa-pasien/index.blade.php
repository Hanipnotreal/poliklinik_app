<x-layouts.app title="Periksa Pasien">

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

                    <i class="fas fa-user-doctor text-white text-lg"></i>

                </div>


                {{-- Text --}}
                <div>

                    <h1 class="text-2xl font-bold text-slate-800">
                        Periksa Pasien
                    </h1>

                    <p class="text-sm text-slate-500 mt-1">
                        Kelola pemeriksaan pasien yang terdaftar
                    </p>

                </div>

            </div>

        </div>

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
                border
                {{ session('type') == 'danger'
                    ? 'border-red-100 bg-red-50 text-red-700'
                    : 'border-emerald-100 bg-emerald-50 text-emerald-700'
                }}
            ">

            <div
                class="
                    w-10 h-10 rounded-xl
                    flex items-center justify-center
                    text-white
                    {{ session('type') == 'danger'
                        ? 'bg-red-500'
                        : 'bg-emerald-500'
                    }}
                ">

                <i class="fas fa-{{ session('type') == 'danger'
                    ? 'circle-xmark'
                    : 'circle-check'
                }}"></i>

            </div>

            <div>

                <p class="font-semibold">
                    {{ session('type') == 'danger' ? 'Gagal' : 'Berhasil' }}
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
                    Daftar Pasien Periksa
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Total {{ $daftarPasien->count() }} pasien terdaftar
                </p>

            </div>

        </div>


        {{-- ================= TABLE ================= --}}
        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px]">

                {{-- Table Head --}}
                <thead
                    class="
                        bg-slate-50/80
                        border-b border-slate-100
                    ">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            No
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Pasien
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Keluhan
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Antrian
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-[0.15em] text-slate-500">
                            Status
                        </th>

                    </tr>

                </thead>


                {{-- ================= TABLE BODY ================= --}}
                <tbody class="divide-y divide-slate-100">

                    @forelse ($daftarPasien as $dp)

                        <tr class="hover:bg-slate-50/70 transition-all duration-200">

                            {{-- No --}}
                            <td class="px-6 py-5 text-slate-500 font-medium">

                                #{{ $loop->iteration }}

                            </td>


                            {{-- Pasien --}}
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
                                            {{ $dp->pasien->nama }}
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

                                    {{ $dp->keluhan ?? '-' }}

                                </p>

                            </td>


                            {{-- Antrian --}}
                            <td class="px-6 py-5">

                                <span
                                    class="
                                        inline-flex items-center justify-center
                                        min-w-[42px] h-10 px-3
                                        rounded-xl
                                        bg-cyan-50
                                        text-cyan-700
                                        text-sm font-bold
                                    ">

                                    {{ $dp->no_antrian }}

                                </span>

                            </td>


                            {{-- Action --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center justify-end">

                                    @if ($dp->periksas->isNotEmpty())

                                        {{-- Sudah Diperiksa --}}
                                        <span
                                            class="
                                                inline-flex items-center gap-2
                                                h-10 px-4 rounded-xl
                                                bg-emerald-50
                                                text-emerald-700
                                                text-sm font-semibold
                                            ">

                                            <i class="fas fa-circle-check text-xs"></i>

                                            Sudah Diperiksa

                                        </span>

                                    @else

                                        {{-- Periksa --}}
                                        <a
                                            href="{{ route('periksa-pasien.create', $dp->id) }}"
                                            class="
                                                inline-flex items-center gap-2
                                                h-10 px-4 rounded-xl
                                                bg-amber-50
                                                hover:bg-amber-100
                                                text-amber-600
                                                text-sm font-semibold
                                                transition-all duration-200
                                            ">

                                            <i class="fas fa-stethoscope text-xs"></i>

                                            Periksa

                                        </a>

                                    @endif

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

                                        <i class="fas fa-user-slash text-3xl text-slate-400"></i>

                                    </div>

                                    <h3 class="text-lg font-semibold text-slate-700">
                                        Tidak Ada Pasien
                                    </h3>

                                    <p class="text-sm text-slate-500 mt-2 max-w-sm">
                                        Saat ini belum ada pasien yang terdaftar untuk pemeriksaan.
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