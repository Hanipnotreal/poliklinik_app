<x-layouts.app title="Daftar Poli">

    {{-- ================= PAGE HEADER ================= --}}
    <div class="mb-8">

        <div class="flex items-center gap-4">

            {{-- Icon --}}
            <div
                class="
                    w-14 h-14 rounded-2xl
                    bg-gradient-to-br from-cyan-500 to-blue-600
                    flex items-center justify-center
                    shadow-lg shadow-cyan-500/20
                ">

                <i class="fas fa-hospital-user text-white text-lg"></i>

            </div>


            {{-- Text --}}
            <div>

                <h1 class="text-2xl font-bold text-slate-800">
                    Pendaftaran Poli
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Lakukan pendaftaran pemeriksaan poli dengan mudah
                </p>

            </div>

        </div>

    </div>


    {{-- ================= SUCCESS ALERT ================= --}}
    @if (session('message'))

        <div
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


    {{-- ================= ERROR ALERT ================= --}}
    @if ($errors->any())

        <div
            class="
                mb-6
                rounded-2xl
                border border-red-100
                bg-red-50
                p-5
            ">

            <div class="flex items-start gap-3">

                <div
                    class="
                        w-10 h-10 rounded-xl
                        bg-red-500
                        flex items-center justify-center
                        text-white flex-shrink-0
                    ">

                    <i class="fas fa-circle-exclamation"></i>

                </div>

                <div>

                    <h3 class="font-semibold text-red-700 mb-2">
                        Terjadi Kesalahan
                    </h3>

                    <ul class="space-y-1 text-sm text-red-600">

                        @foreach ($errors->all() as $error)

                            <li>
                                • {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- ================= FORM CARD ================= --}}
    <div
        class="
            bg-white
            rounded-[28px]
            border border-slate-200/70
            shadow-sm
            overflow-hidden
        ">

        {{-- ================= CARD HEADER ================= --}}
        <div
            class="
                px-8 py-6
                border-b border-slate-100
                bg-slate-50/50
            ">

            <div class="flex items-center gap-4">

                {{-- Icon --}}
                <div
                    class="
                        w-14 h-14 rounded-2xl
                        bg-gradient-to-br from-cyan-500 to-blue-600
                        flex items-center justify-center
                        shadow-lg shadow-cyan-500/20
                    ">

                    <i class="fas fa-notes-medical text-white text-lg"></i>

                </div>


                {{-- Text --}}
                <div>

                    <h2 class="text-lg font-bold text-slate-800">
                        Form Pendaftaran
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Lengkapi data pendaftaran pemeriksaan poli
                    </p>

                </div>

            </div>

        </div>


        {{-- ================= FORM BODY ================= --}}
        <div class="p-8">

            <form
                action="{{ route('pasien.daftar.submit') }}"
                method="POST"
                class="space-y-7">

                @csrf

                <input
                    type="hidden"
                    name="id_pasien"
                    value="{{ $user->id }}">


                {{-- ================= NOMOR RM ================= --}}
                <div>

                    <label class="block mb-2 text-sm font-semibold text-slate-700">

                        Nomor Rekam Medis

                    </label>

                    <input
                        type="text"
                        value="{{ $user->no_rm }}"
                        class="
                            w-full h-14 px-5
                            rounded-2xl
                            border border-slate-200
                            bg-slate-100
                            text-slate-600
                            cursor-not-allowed
                        "
                        disabled>

                </div>


                {{-- ================= GRID ================= --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Poli --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-slate-700">

                            Pilih Poli
                            <span class="text-red-500">*</span>

                        </label>

                        <select
                            name="id_poli"
                            id="poliSelect"
                            class="
                                w-full h-14 px-5
                                rounded-2xl
                                border border-slate-200
                                bg-white
                                text-slate-700
                                focus:outline-none
                                focus:ring-4
                                focus:ring-cyan-100
                                focus:border-cyan-400
                                transition-all duration-200
                            "
                            required>

                            <option value="">
                                -- Pilih Poli --
                            </option>

                            @foreach ($polis as $poli)

                                <option value="{{ $poli->id }}">
                                    {{ $poli->nama_poli }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Jadwal --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-slate-700">

                            Pilih Jadwal
                            <span class="text-red-500">*</span>

                        </label>

                        <select
                            name="id_jadwal"
                            id="jadwalSelect"
                            class="
                                w-full h-14 px-5
                                rounded-2xl
                                border border-slate-200
                                bg-white
                                text-slate-700
                                focus:outline-none
                                focus:ring-4
                                focus:ring-cyan-100
                                focus:border-cyan-400
                                transition-all duration-200
                            "
                            required>

                            <option value="">
                                -- Pilih Jadwal --
                            </option>

                            @foreach ($jadwals as $jadwal)

                                <option
                                    value="{{ $jadwal->id }}"
                                    data-poli="{{ $jadwal->dokter->id_poli }}">

                                    {{ $jadwal->hari }}
                                    •
                                    {{ $jadwal->jam_mulai }}
                                    -
                                    {{ $jadwal->jam_selesai }}
                                    •
                                    Dr. {{ $jadwal->dokter->nama ?? '--' }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>


                {{-- ================= KELUHAN ================= --}}
                <div>

                    <label class="block mb-2 text-sm font-semibold text-slate-700">

                        Keluhan

                    </label>

                    <textarea
                        name="keluhan"
                        rows="4"
                        placeholder="Tuliskan keluhan pasien..."
                        class="
                            w-full px-5 py-4
                            rounded-2xl
                            border border-slate-200
                            bg-white
                            text-slate-700
                            placeholder:text-slate-400
                            focus:outline-none
                            focus:ring-4
                            focus:ring-cyan-100
                            focus:border-cyan-400
                            transition-all duration-200
                            resize-none
                        ">{{ old('keluhan') }}</textarea>

                </div>


                {{-- ================= ACTION BUTTON ================= --}}
                <div class="pt-2">

                    <button
                        type="submit"
                        class="
                            inline-flex items-center justify-center gap-2
                            h-12 px-6 rounded-2xl
                            bg-gradient-to-r from-cyan-500 to-blue-600
                            hover:from-cyan-600 hover:to-blue-700
                            text-white font-semibold text-sm
                            shadow-lg shadow-cyan-500/20
                            transition-all duration-300
                            hover:-translate-y-0.5
                        ">

                        <i class="fas fa-paper-plane text-sm"></i>

                        Daftar Sekarang

                    </button>

                </div>

            </form>

        </div>

    </div>


    {{-- ================= FILTER JADWAL ================= --}}
    @push('scripts')

    <script>

        document.addEventListener("DOMContentLoaded", function(){

            const poliSelect = document.getElementById("poliSelect")
            const jadwalSelect = document.getElementById("jadwalSelect")
            const jadwalOptions = jadwalSelect.querySelectorAll("option")

            poliSelect.addEventListener("change", function(){

                let poliId = this.value

                jadwalOptions.forEach(option => {

                    if(option.value === ""){
                        option.style.display = "block"
                        return
                    }

                    if(option.dataset.poli === poliId){
                        option.style.display = "block"
                    }
                    else{
                        option.style.display = "none"
                    }

                })

                jadwalSelect.value = ""

            })

        })

    </script>

    @endpush

</x-layouts.app>