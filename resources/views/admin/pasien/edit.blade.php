<x-layouts.app title="Edit Pasien">

    {{-- ================= PAGE HEADER ================= --}}
    <div class="flex items-center justify-between mb-8">

        <div class="flex items-center gap-4">

            {{-- Back Button --}}
            <a
                href="{{ route('pasien.index') }}"
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
                    Edit Pasien
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Perbarui informasi data pasien
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

                    <i class="fas fa-user-injured text-white text-lg"></i>

                </div>


                {{-- Header Text --}}
                <div>

                    <h2 class="text-lg font-bold text-slate-800">
                        Form Edit Pasien
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Pastikan data pasien telah diperbarui dengan benar
                    </p>

                </div>

            </div>

        </div>


        {{-- ================= FORM BODY ================= --}}
        <div class="p-8">

            <form
                action="{{ route('pasien.update', $pasien->id) }}"
                method="POST"
                class="space-y-7">

                @csrf
                @method('PUT')


                {{-- ================= GRID ================= --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Nama --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-slate-700">

                            Nama Pasien
                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama', $pasien->nama) }}"
                            placeholder="Masukkan nama pasien..."
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
                                @error('nama')
                                    border-red-400
                                    focus:ring-red-100
                                @enderror
                            "
                            required>

                        @error('nama')

                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- Email --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-slate-700">

                            Email
                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email', $pasien->email) }}"
                            placeholder="Masukkan email..."
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
                                @error('email')
                                    border-red-400
                                    focus:ring-red-100
                                @enderror
                            "
                            required>

                        @error('email')

                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- No KTP --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-slate-700">

                            No. KTP
                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            type="number"
                            name="no_ktp"
                            value="{{ old('no_ktp', $pasien->no_ktp) }}"
                            placeholder="Masukkan nomor KTP..."
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
                                @error('no_ktp')
                                    border-red-400
                                    focus:ring-red-100
                                @enderror
                            "
                            required>

                        @error('no_ktp')

                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- No HP --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-slate-700">

                            No. HP
                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            type="number"
                            name="no_hp"
                            value="{{ old('no_hp', $pasien->no_hp) }}"
                            placeholder="Masukkan nomor HP..."
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
                                @error('no_hp')
                                    border-red-400
                                    focus:ring-red-100
                                @enderror
                            "
                            required>

                        @error('no_hp')

                            <p class="mt-2 text-sm text-red-500">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>

                </div>


                {{-- ================= ALAMAT ================= --}}
                <div>

                    <label class="block mb-2 text-sm font-semibold text-slate-700">

                        Alamat
                        <span class="text-red-500">*</span>

                    </label>

                    <textarea
                        name="alamat"
                        rows="4"
                        placeholder="Masukkan alamat lengkap..."
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
                            @error('alamat')
                                border-red-400
                                focus:ring-red-100
                            @enderror
                        "
                        required>{{ old('alamat', $pasien->alamat) }}</textarea>

                    @error('alamat')

                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>


                {{-- ================= PASSWORD ================= --}}
                <div>

                    <label class="block mb-2 text-sm font-semibold text-slate-700">

                        Password Baru

                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Kosongkan jika tidak ingin mengganti password..."
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
                            @error('password')
                                border-red-400
                                focus:ring-red-100
                            @enderror
                        ">

                    @error('password')

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
                        href="{{ route('pasien.index') }}"
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