<x-layouts.app title="Tambah Dokter">

    {{-- ================= PAGE HEADER ================= --}}
    <div class="flex items-center justify-between mb-8">

        <div class="flex items-center gap-4">

            {{-- Back Button --}}
            <a
                href="{{ route('dokter.index') }}"
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
                    Tambah Dokter
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Tambahkan data dokter baru ke dalam sistem
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

                    <i class="fas fa-user-doctor text-white text-lg"></i>

                </div>

                <div>

                    <h2 class="text-lg font-bold text-slate-800">
                        Form Tambah Dokter
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Lengkapi informasi dokter dengan benar
                    </p>

                </div>

            </div>

        </div>


        {{-- ================= FORM BODY ================= --}}
        <div class="p-8">

            <form
                action="{{ route('dokter.store') }}"
                method="POST"
                class="space-y-7">

                @csrf


                {{-- ================= GRID ================= --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Nama --}}
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-slate-700">
                            Nama Dokter
                            <span class="text-red-500">*</span>
                        </label>

                        <input
                            type="text"
                            name="nama"
                            value="{{ old('nama') }}"
                            placeholder="Masukkan nama dokter..."
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
                            value="{{ old('email') }}"
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
                            value="{{ old('no_ktp') }}"
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
                            value="{{ old('no_hp') }}"
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


                {{-- Alamat --}}
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
                        required>{{ old('alamat') }}</textarea>

                    @error('alamat')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Poli --}}
                <div>

                    <label class="block mb-2 text-sm font-semibold text-slate-700">
                        Poli
                        <span class="text-red-500">*</span>
                    </label>

                    <select
                        name="id_poli"
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
                            @error('id_poli')
                                border-red-400
                                focus:ring-red-100
                            @enderror
                        "
                        required>

                        <option value="">
                            Pilih Poli
                        </option>

                        @foreach($polis as $poli)

                            <option
                                value="{{ $poli->id }}"
                                {{ old('id_poli') == $poli->id ? 'selected' : '' }}>

                                {{ $poli->nama_poli }}

                            </option>

                        @endforeach

                    </select>

                    @error('id_poli')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Password --}}
                <div>

                    <label class="block mb-2 text-sm font-semibold text-slate-700">
                        Password
                        <span class="text-red-500">*</span>
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Minimal 8 karakter..."
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
                        "
                        required>

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

                        Simpan Data

                    </button>


                    {{-- Cancel --}}
                    <a
                        href="{{ route('dokter.index') }}"
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