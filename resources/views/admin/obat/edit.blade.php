<x-layouts.app title="Edit Obat">

    {{-- ================= PAGE HEADER ================= --}}
    <div class="flex items-center justify-between mb-8">

        <div class="flex items-center gap-4">

            {{-- Back Button --}}
            <a
                href="{{ route('obat.index') }}"
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
                    Edit Obat
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Perbarui informasi data obat
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

                    <i class="fas fa-capsules text-white text-lg"></i>

                </div>


                {{-- Header Text --}}
                <div>

                    <h2 class="text-lg font-bold text-slate-800">
                        Form Edit Obat
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Pastikan data obat telah diperbarui dengan benar
                    </p>

                </div>

            </div>

        </div>


        {{-- ================= FORM BODY ================= --}}
        <div class="p-8">

            <form
                action="{{ route('obat.update', $obat->id) }}"
                method="POST"
                class="space-y-7">

                @csrf
                @method('PUT')


                {{-- ================= GRID ================= --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Nama Obat --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-slate-700">

                            Nama Obat
                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            type="text"
                            name="nama_obat"
                            value="{{ old('nama_obat', $obat->nama_obat) }}"
                            placeholder="Masukkan nama obat..."
                            class="
                                w-full h-14 px-5
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
                                @error('nama_obat')
                                    border-red-400
                                    focus:ring-red-100
                                @enderror
                            "
                            required>

                        @error('nama_obat')

                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Kemasan --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-slate-700">

                            Kemasan

                        </label>

                        <input
                            type="text"
                            name="kemasan"
                            value="{{ old('kemasan', $obat->kemasan) }}"
                            placeholder="Contoh: Strip, Botol, Tube..."
                            class="
                                w-full h-14 px-5
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
                                @error('kemasan')
                                    border-red-400
                                    focus:ring-red-100
                                @enderror
                            ">

                        @error('kemasan')

                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>


                {{-- ================= HARGA ================= --}}
                <div>

                    <label class="block mb-2 text-sm font-semibold text-slate-700">

                        Harga
                        <span class="text-red-500">*</span>

                    </label>

                    <div
                        class="
                            flex items-center
                            h-14 px-5
                            rounded-2xl
                            border border-slate-200
                            bg-white
                            focus-within:ring-4
                            focus-within:ring-cyan-100
                            focus-within:border-cyan-400
                            transition-all duration-200
                            @error('harga')
                                border-red-400
                                focus-within:ring-red-100
                            @enderror
                        ">

                        <span class="text-slate-500 font-semibold mr-3">
                            Rp
                        </span>

                        <input
                            type="number"
                            name="harga"
                            value="{{ old('harga', $obat->harga) }}"
                            placeholder="0"
                            min="0"
                            step="1"
                            class="
                                w-full bg-transparent
                                border-none outline-none
                                text-slate-700
                                placeholder:text-slate-400
                            "
                            required>

                    </div>

                    @error('harga')

                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

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
                        href="{{ route('obat.index') }}"
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