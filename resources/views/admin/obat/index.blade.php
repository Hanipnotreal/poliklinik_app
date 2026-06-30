<x-layouts.app title="Data Obat">

    {{-- ================= PAGE HEADER ================= --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-8">

        <div>
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center shadow-lg shadow-cyan-500/20">
                    <i class="fas fa-capsules text-white text-lg"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-slate-800">Data Obat</h1>
                    <p class="text-sm text-slate-500 mt-0.5">Kelola data obat dan persediaan klinik</p>
                </div>
            </div>
        </div>

        <a href="{{ route('obat.create') }}"
            class="inline-flex items-center justify-center gap-2 px-5 h-12 rounded-2xl bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-600 hover:to-blue-700 text-white font-semibold text-sm shadow-lg shadow-cyan-500/20 transition-all duration-300 hover:-translate-y-0.5">
            <i class="fas fa-plus text-sm"></i>
            Tambah Obat
        </a>

    </div>


    {{-- ================= ALERT ================= --}}
    @if(session('message'))
        <div class="mb-6 px-5 py-4 rounded-2xl flex items-center gap-3
            {{ session('type') === 'success' ? 'bg-green-50 border border-green-200 text-green-700' : 'bg-red-50 border border-red-200 text-red-700' }}">
            <i class="fas {{ session('type') === 'success' ? 'fa-circle-check' : 'fa-circle-exclamation' }} text-lg"></i>
            <span class="font-medium text-sm">{{ session('message') }}</span>
        </div>
    @endif


    {{-- ================= TABLE CARD ================= --}}
    <div class="overflow-hidden rounded-[28px] border border-slate-200/70 bg-white shadow-sm">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 px-6 py-5 border-b border-slate-100">
            <div>
                <h2 class="font-semibold text-slate-800">Daftar Obat</h2>
                <p class="text-sm text-slate-500 mt-1">Total {{ $obats->count() }} obat tersedia</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[1000px]">

                <thead class="bg-slate-50/80 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">Obat</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">Kemasan</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">Harga</th>
                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-[0.15em] text-slate-500">Stok</th>
                        <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-[0.15em] text-slate-500">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($obats as $obat)
                        <tr class="hover:bg-slate-50/70 transition-all duration-200">

                            {{-- Obat --}}
                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-600 flex items-center justify-center text-white shadow-lg shadow-cyan-500/10">
                                        <i class="fas fa-capsules text-sm"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-800">{{ $obat->nama_obat }}</p>
                                        <p class="text-xs text-slate-400 mt-0.5">Obat Klinik</p>
                                    </div>
                                </div>
                            </td>

                            {{-- Kemasan --}}
                            <td class="px-6 py-5">
                                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-cyan-50 text-cyan-700 text-xs font-semibold">
                                    <span class="w-2 h-2 rounded-full bg-cyan-500"></span>
                                    {{ $obat->kemasan ?? '-' }}
                                </span>
                            </td>

                            {{-- Harga --}}
                            <td class="px-6 py-5">
                                <p class="font-semibold text-slate-800">Rp {{ number_format($obat->harga, 0, ',', '.') }}</p>
                            </td>

                            {{-- Stok --}}
                            <td class="px-6 py-5">
                                @if($obat->stok <= 0)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-red-50 text-red-600 text-xs font-bold">
                                        <span class="w-2 h-2 rounded-full bg-red-500"></span>
                                        Habis
                                    </span>
                                @elseif($obat->stok <= 10)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-amber-50 text-amber-600 text-xs font-bold">
                                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                        {{ $obat->stok }} (Menipis)
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-green-50 text-green-600 text-xs font-bold">
                                        <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                        {{ $obat->stok }}
                                    </span>
                                @endif
                            </td>

                            {{-- Aksi --}}
                            <td class="px-6 py-5">
                                <div class="flex items-center justify-end gap-2">

                                    {{-- Tambah Stok --}}
                                    <button
                                        onclick="openModal('modalTambah{{ $obat->id }}')"
                                        class="inline-flex items-center gap-2 h-10 px-4 rounded-xl bg-green-50 hover:bg-green-100 text-green-600 text-sm font-semibold transition-all duration-200">
                                        <i class="fas fa-plus text-xs"></i>
                                        Stok
                                    </button>

                                    {{-- Kurangi Stok --}}
                                    <button
                                        onclick="openModal('modalKurangi{{ $obat->id }}')"
                                        class="inline-flex items-center gap-2 h-10 px-4 rounded-xl bg-orange-50 hover:bg-orange-100 text-orange-600 text-sm font-semibold transition-all duration-200">
                                        <i class="fas fa-minus text-xs"></i>
                                        Stok
                                    </button>

                                    {{-- Edit --}}
                                    <a href="{{ route('obat.edit', $obat->id) }}"
                                        class="inline-flex items-center gap-2 h-10 px-4 rounded-xl bg-amber-50 hover:bg-amber-100 text-amber-600 text-sm font-semibold transition-all duration-200">
                                        <i class="fas fa-pen-to-square text-xs"></i>
                                        Edit
                                    </a>

                                    {{-- Hapus --}}
                                    <form action="{{ route('obat.destroy', $obat->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus obat ini?')"
                                            class="inline-flex items-center gap-2 h-10 px-4 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 text-sm font-semibold transition-all duration-200">
                                            <i class="fas fa-trash text-xs"></i>
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>


                        {{-- ===== MODAL TAMBAH STOK ===== --}}
                        <div id="modalTambah{{ $obat->id }}"
                            class="fixed inset-0 z-50 hidden items-center justify-center p-4"
                            style="background: rgba(0,0,0,0.4); backdrop-filter: blur(4px);">

                            <div class="bg-white rounded-[28px] shadow-2xl w-full max-w-md p-8">

                                {{-- Header --}}
                                <div class="flex items-center gap-4 mb-6">
                                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-green-400 to-emerald-600 flex items-center justify-center shadow-lg shadow-green-500/20">
                                        <i class="fas fa-plus text-white"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-slate-800">Tambah Stok</h3>
                                        <p class="text-sm text-slate-500">{{ $obat->nama_obat }} · Stok saat ini: <span class="font-bold text-slate-700">{{ $obat->stok }}</span></p>
                                    </div>
                                </div>

                                {{-- Form --}}
                                <form action="{{ route('obat.tambahStok', $obat->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-5">
                                        <label class="block mb-2 text-sm font-semibold text-slate-700">
                                            Jumlah Tambah <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="number"
                                            name="jumlah"
                                            min="1"
                                            placeholder="Masukkan jumlah..."
                                            class="w-full h-14 px-5 rounded-2xl border border-slate-200 bg-white text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-4 focus:ring-green-100 focus:border-green-400 transition-all duration-200"
                                            required>
                                    </div>
                                    <div class="flex gap-3">
                                        <button type="submit"
                                            class="flex-1 h-12 rounded-2xl bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold text-sm shadow-lg shadow-green-500/20 transition-all duration-300">
                                            <i class="fas fa-plus mr-2"></i> Tambah Stok
                                        </button>
                                        <button type="button"
                                            onclick="closeModal('modalTambah{{ $obat->id }}')"
                                            class="h-12 px-5 rounded-2xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-600 font-semibold text-sm transition-all duration-200">
                                            Batal
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>


                        {{-- ===== MODAL KURANGI STOK ===== --}}
                        <div id="modalKurangi{{ $obat->id }}"
                            class="fixed inset-0 z-50 hidden items-center justify-center p-4"
                            style="background: rgba(0,0,0,0.4); backdrop-filter: blur(4px);">

                            <div class="bg-white rounded-[28px] shadow-2xl w-full max-w-md p-8">

                                {{-- Header --}}
                                <div class="flex items-center gap-4 mb-6">
                                    <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center shadow-lg shadow-orange-500/20">
                                        <i class="fas fa-minus text-white"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-slate-800">Kurangi Stok</h3>
                                        <p class="text-sm text-slate-500">{{ $obat->nama_obat }} · Stok saat ini: <span class="font-bold text-slate-700">{{ $obat->stok }}</span></p>
                                    </div>
                                </div>

                                {{-- Form --}}
                                <form action="{{ route('obat.kurangiStok', $obat->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-5">
                                        <label class="block mb-2 text-sm font-semibold text-slate-700">
                                            Jumlah Kurangi <span class="text-red-500">*</span>
                                        </label>
                                        <input
                                            type="number"
                                            name="jumlah"
                                            min="1"
                                            max="{{ $obat->stok }}"
                                            placeholder="Masukkan jumlah..."
                                            class="w-full h-14 px-5 rounded-2xl border border-slate-200 bg-white text-slate-700 placeholder:text-slate-400 focus:outline-none focus:ring-4 focus:ring-orange-100 focus:border-orange-400 transition-all duration-200"
                                            required>
                                        <p class="mt-2 text-xs text-slate-400">Maksimal: {{ $obat->stok }} unit</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <button type="submit"
                                            class="flex-1 h-12 rounded-2xl bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-600 hover:to-red-600 text-white font-semibold text-sm shadow-lg shadow-orange-500/20 transition-all duration-300">
                                            <i class="fas fa-minus mr-2"></i> Kurangi Stok
                                        </button>
                                        <button type="button"
                                            onclick="closeModal('modalKurangi{{ $obat->id }}')"
                                            class="h-12 px-5 rounded-2xl border border-slate-200 bg-white hover:bg-slate-50 text-slate-600 font-semibold text-sm transition-all duration-200">
                                            Batal
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    @empty

                        <tr>
                            <td colspan="5" class="py-20">
                                <div class="flex flex-col items-center justify-center text-center">
                                    <div class="w-20 h-20 rounded-full bg-slate-100 flex items-center justify-center mb-5">
                                        <i class="fas fa-capsules text-3xl text-slate-400"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-slate-700">Belum Ada Data Obat</h3>
                                    <p class="text-sm text-slate-500 mt-2 max-w-sm">Saat ini belum terdapat data obat yang tersedia pada sistem.</p>
                                </div>
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

    </div>


    {{-- ================= MODAL SCRIPT ================= --}}
    <script>
        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Tutup modal jika klik di luar
        document.querySelectorAll('[id^="modal"]').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === this) closeModal(this.id);
            });
        });
    </script>

</x-layouts.app>