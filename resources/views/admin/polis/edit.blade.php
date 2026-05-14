<x-layouts.app title="Edit Poli">

    {{-- ================= PAGE HEADER ================= --}}
    <div class="flex items-center justify-between mb-8">

        <div class="flex items-center gap-4">

            {{-- Back Button --}}
            <a
                href="{{ route('polis.index') }}"
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
                    Edit Poli
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Perbarui informasi data poli klinik
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

        {{-- Card Header --}}
        <div
            class="
                px-8 py-6
                border-b border-slate-100
                bg-slate-50/50
            ">

            <div class="flex items-center gap-4">

                <div
                    class="
                        w-14 h-14 rounded-2xl
                        bg-gradient-to-br from-cyan-400 to-blue-500
                        flex items-center justify-center
                        shadow-lg shadow-cyan-500/20
                    ">

                    <i class="fas fa-hospital text-white text-lg"></i>

                </div>

                <div>

                    <h2 class="text-lg font-bold text-slate-800">
                        Form Edit Poli
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Silakan perbarui data poli dengan benar
                    </p>

                </div>

            </div>

        </div>


        {{-- ================= FORM BODY ================= --}}
        <div class="p-8">

            <form
                action="{{ route('polis.update', $poli->id) }}"
                method="POST"
                class="space-y-7">

                @csrf
                @method('PUT')


                {{-- ================= NAMA POLI ================= --}}
                <div>

                    <label
                        class="
                            block mb-2
                            text-sm font-semibold
                            text-slate-700
                        ">

                        Nama Poli
                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        type="text"
                        name="nama_poli"
                        value="{{ old('nama_poli', $poli->nama_poli) }}"
                        placeholder="Masukkan nama poli..."
                        class="
                            w-full h-14
                            px-5
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
                            @error('nama_poli')
                                border-red-400
                                focus:ring-red-100
                            @enderror
                        "
                        required>

                    @error('nama_poli')

                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- ================= KETERANGAN ================= --}}
                <div>

                    <label
                        class="
                            block mb-2
                            text-sm font-semibold
                            text-slate-700
                        ">

                        Keterangan
                        <span class="text-red-500">*</span>

                    </label>

                    <textarea
                        name="keterangan"
                        rows="5"
                        placeholder="Masukkan keterangan poli..."
                        class="
                            w-full
                            px-5 py-4
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
                            @error('keterangan')
                                border-red-400
                                focus:ring-red-100
                            @enderror
                        "
                        required>{{ old('keterangan', $poli->keterangan) }}</textarea>

                    @error('keterangan')

                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- ================= ACTION BUTTON ================= --}}
                <div
                    class="
                        flex flex-col sm:flex-row
                        gap-3
                        pt-4
                    ">

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
                        href="{{ route('polis.index') }}"
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