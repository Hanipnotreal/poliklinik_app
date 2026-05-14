<x-layouts.app title="Edit Jadwal Periksa">

    {{-- ================= PAGE HEADER ================= --}}
    <div class="flex items-center justify-between mb-8">

        <div class="flex items-center gap-4">

            {{-- Back Button --}}
            <a
                href="{{ route('jadwal-periksa.index') }}"
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
                    Edit Jadwal Periksa
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Perbarui data jadwal pemeriksaan dokter
                </p>

            </div>

        </div>

    </div>


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

                    <i class="fas fa-calendar-pen text-white text-lg"></i>

                </div>


                {{-- Text --}}
                <div>

                    <h2 class="text-lg font-bold text-slate-800">
                        Form Edit Jadwal
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Pastikan data jadwal telah diperbarui dengan benar
                    </p>

                </div>

            </div>

        </div>


        {{-- ================= FORM BODY ================= --}}
        <div class="p-8">

            <form
                action="{{ route('jadwal-periksa.update', $jadwalPeriksa->id) }}"
                method="POST"
                class="space-y-7">

                @csrf
                @method('PUT')


                {{-- ================= HARI ================= --}}
                <div>

                    <label class="block mb-2 text-sm font-semibold text-slate-700">

                        Hari
                        <span class="text-red-500">*</span>

                    </label>

                    <select
                        name="hari"
                        id="hari"
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
                            @error('hari')
                                border-red-400
                                focus:ring-red-100
                            @enderror
                        "
                        required>

                        <option value="">
                            Pilih Hari
                        </option>

                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)

                            <option
                                value="{{ $day }}"
                                {{ old('hari', $jadwalPeriksa->hari) == $day ? 'selected' : '' }}>

                                {{ $day }}

                            </option>

                        @endforeach

                    </select>

                    @error('hari')

                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- ================= GRID JAM ================= --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Jam Mulai --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-slate-700">

                            Jam Mulai
                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            type="time"
                            name="jam_mulai"
                            id="jam_mulai"
                            value="{{ old('jam_mulai', $jadwalPeriksa->jam_mulai) }}"
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
                                @error('jam_mulai')
                                    border-red-400
                                    focus:ring-red-100
                                @enderror
                            "
                            required>

                        @error('jam_mulai')

                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Jam Selesai --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-slate-700">

                            Jam Selesai
                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            type="time"
                            name="jam_selesai"
                            id="jam_selesai"
                            value="{{ old('jam_selesai', $jadwalPeriksa->jam_selesai) }}"
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
                                @error('jam_selesai')
                                    border-red-400
                                    focus:ring-red-100
                                @enderror
                            "
                            required>

                        @error('jam_selesai')

                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>


                {{-- ================= INFO CARD ================= --}}
                <div
                    class="
                        flex items-start gap-3
                        p-5 rounded-2xl
                        border border-cyan-100
                        bg-cyan-50
                    ">

                    <div
                        class="
                            w-10 h-10 rounded-xl
                            bg-cyan-500
                            flex items-center justify-center
                            text-white flex-shrink-0
                        ">

                        <i class="fas fa-circle-info"></i>

                    </div>

                    <div>

                        <h3 class="font-semibold text-cyan-700">
                            Informasi Jadwal
                        </h3>

                        <p class="text-sm text-cyan-600 mt-1 leading-relaxed">
                            Pastikan jam selesai lebih besar dari jam mulai
                            agar jadwal pemeriksaan tetap valid.
                        </p>

                    </div>

                </div>


                {{-- ================= ACTION BUTTON ================= --}}
                <div class="flex flex-col sm:flex-row gap-3 pt-4">

                    {{-- Submit --}}
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

                        <i class="fas fa-floppy-disk text-sm"></i>

                        Simpan Perubahan

                    </button>


                    {{-- Cancel --}}
                    <a
                        href="{{ route('jadwal-periksa.index') }}"
                        class="
                            inline-flex items-center justify-center gap-2
                            h-12 px-6 rounded-2xl
                            border border-slate-200
                            bg-white
                            hover:bg-slate-50
                            text-slate-600 font-semibold text-sm
                            transition-all duration-200
                        ">

                        <i class="fas fa-xmark text-sm"></i>

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</x-layouts.app>