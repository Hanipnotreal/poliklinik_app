<x-layouts.app title="Periksa Pasien">

    {{-- ================= PAGE HEADER ================= --}}
    <div class="flex items-center justify-between mb-8">

        <div class="flex items-center gap-4">

            {{-- Back Button --}}
            <a
                href="{{ route('periksa-pasien.index') }}"
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
                    Periksa Pasien
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Tambahkan hasil pemeriksaan pasien
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

                    <i class="fas fa-stethoscope text-white text-lg"></i>

                </div>


                {{-- Text --}}
                <div>

                    <h2 class="text-lg font-bold text-slate-800">
                        Form Pemeriksaan
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Lengkapi data pemeriksaan pasien dengan benar
                    </p>

                </div>

            </div>

        </div>


        {{-- ================= FORM BODY ================= --}}
        <div class="p-8">

            <form
                action="{{ route('periksa-pasien.store') }}"
                method="POST"
                class="space-y-7">

                @csrf

                <input
                    type="hidden"
                    name="id_daftar_poli"
                    value="{{ $id }}">


                {{-- ================= PILIH OBAT ================= --}}
                <div>

                    <label class="block mb-2 text-sm font-semibold text-slate-700">

                        Pilih Obat
                        <span class="text-red-500">*</span>

                    </label>

                    <select
                        id="select-obat"
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
                        ">

                        <option value="">
                            -- Pilih Obat --
                        </option>

                        @foreach ($obats as $obat)
                            <option
                                value="{{ $obat->id }}"
                                data-nama="{{ $obat->nama_obat }}"
                                data-harga="{{ $obat->harga }}"
                                data-stok="{{ $obat->stok }}"
                                {{ $obat->stok <= 0 ? 'disabled' : '' }}>

                                {{ $obat->nama_obat }}
                                — Rp{{ number_format($obat->harga) }}
                                — Stok: {{ $obat->stok <= 0 ? 'Habis' : $obat->stok }}

                            </option>
                        @endforeach

                    </select>

                </div>


                {{-- ================= OBAT TERPILIH ================= --}}
                <div>

                    <label class="block mb-3 text-sm font-semibold text-slate-700">

                        Obat Terpilih

                    </label>

                    <div
                        id="empty-obat"
                        class="
                            flex items-center justify-center
                            h-28 rounded-2xl
                            border border-dashed border-slate-300
                            bg-slate-50
                            text-slate-400 text-sm
                        ">

                        Belum ada obat dipilih

                    </div>

                    <ul
                        id="obat-terpilih"
                        class="flex flex-col gap-3"></ul>

                    <input
                        type="hidden"
                        name="biaya_periksa"
                        id="biaya_periksa"
                        value="0">

                    <input
                        type="hidden"
                        name="obat_json"
                        id="obat_json">

                </div>


                {{-- ================= TOTAL HARGA ================= --}}
                <div
                    class="
                        p-5 rounded-2xl
                        border border-cyan-100
                        bg-cyan-50
                    ">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm font-medium text-cyan-700">
                                Total Biaya Pemeriksaan
                            </p>

                            <p class="text-xs text-cyan-600 mt-1">
                                Akumulasi total harga obat pasien
                            </p>

                        </div>

                        <div
                            id="total-harga"
                            class="
                                text-2xl font-bold
                                text-cyan-700
                            ">

                            Rp 0

                        </div>

                    </div>

                </div>


                {{-- ================= CATATAN ================= --}}
                <div>

                    <label class="block mb-2 text-sm font-semibold text-slate-700">

                        Catatan
                        <span class="text-slate-400 font-normal">
                            (Opsional)
                        </span>

                    </label>

                    <textarea
                        name="catatan"
                        id="catatan"
                        rows="5"
                        placeholder="Masukkan catatan pemeriksaan..."
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
                        ">{{ old('catatan') }}</textarea>

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

                        Simpan Pemeriksaan

                    </button>


                    {{-- Cancel --}}
                    <a
                        href="{{ route('periksa-pasien.index') }}"
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


    {{-- ================= SCRIPT ================= --}}
    <script>

    const selectObat = document.getElementById('select-obat')
    const listObat = document.getElementById('obat-terpilih')
    const inputBiaya = document.getElementById('biaya_periksa')
    const inputObatJson = document.getElementById('obat_json')
    const totalHargaEl = document.getElementById('total-harga')
    const emptyObat = document.getElementById('empty-obat')

    let daftarObat = []

    selectObat.addEventListener('change', () => {

        const selectedOption = selectObat.options[selectObat.selectedIndex]

        const id = selectedOption.value
        const nama = selectedOption.dataset.nama
        const harga = parseInt(selectedOption.dataset.harga || 0)
        const stok = parseInt(selectedOption.dataset.stok || 0)

        if (!id) return

        // Cek stok habis
        if (stok <= 0) {
            alert('Stok obat "' + nama + '" sudah habis!')
            selectObat.selectedIndex = 0
            return
        }

        // Cek duplikat
        if (daftarObat.some(o => o.id == id)) {
            selectObat.selectedIndex = 0
            return
        }

        daftarObat.push({ id, nama, harga, stok })

        renderObat()

        selectObat.selectedIndex = 0

    })


    function renderObat() {

        listObat.innerHTML = ''

        let total = 0

        if (daftarObat.length > 0) {
            emptyObat.classList.add('hidden')
        } else {
            emptyObat.classList.remove('hidden')
        }

        daftarObat.forEach((obat, index) => {

            total += obat.harga

            const item = document.createElement('li')

            item.className = `
                flex items-center justify-between
                gap-4 p-4 rounded-2xl
                border border-slate-200 bg-slate-50
            `

            // Badge warna stok
            const stokColor = obat.stok <= 10
                ? 'bg-amber-50 text-amber-600'
                : 'bg-green-50 text-green-600'

            item.innerHTML = `
                <div>
                    <p class="font-semibold text-slate-700">${obat.nama}</p>
                    <div class="flex items-center gap-3 mt-1">
                        <p class="text-sm text-slate-500">Rp ${obat.harga.toLocaleString()}</p>
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-semibold ${stokColor}">
                            <span class="w-1.5 h-1.5 rounded-full bg-current"></span>
                            Stok: ${obat.stok}
                        </span>
                    </div>
                </div>
                <button
                    type="button"
                    onclick="hapusObat(${index})"
                    class="
                        inline-flex items-center justify-center
                        w-10 h-10 rounded-xl
                        bg-red-50 hover:bg-red-100
                        text-red-600
                        transition-all duration-200
                    ">
                    <i class="fas fa-trash text-sm"></i>
                </button>
            `

            listObat.appendChild(item)

        })

        inputBiaya.value = total
        totalHargaEl.textContent = `Rp ${total.toLocaleString()}`
        inputObatJson.value = JSON.stringify(daftarObat.map(o => o.id))

    }


    function hapusObat(index) {
        daftarObat.splice(index, 1)
        renderObat()
    }

</script>
</x-layouts.app>