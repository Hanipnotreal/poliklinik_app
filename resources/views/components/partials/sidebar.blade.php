@php
    $baseLink = "
        group flex items-center gap-3
        px-4 py-3 rounded-2xl text-sm
        transition-all duration-200
    ";

    $inactive = "
        text-slate-300/90
        hover:bg-white/10
        hover:text-white
    ";

    $active = "
        bg-white/10
        text-white font-semibold
        border border-cyan-400/20
        shadow-lg shadow-cyan-500/10
        backdrop-blur-xl
    ";
@endphp

<aside
    id="sidebar"
    class="
        fixed lg:static inset-y-0 left-0 z-50
        w-[280px] min-h-screen
        bg-gradient-to-b from-[#18245c] via-[#24358f] to-[#1d2d78]
        border-r border-white/10
        flex flex-col
        shadow-2xl
        transition-all duration-300
    ">

    {{-- ================= BRAND ================= --}}
    <div class="px-6 py-5 border-b border-white/10">

        <div class="flex items-center gap-4">

            {{-- Logo --}}
            <div
                class="
                    w-14 h-14 rounded-2xl
                    bg-gradient-to-br from-cyan-400 to-blue-500
                    flex items-center justify-center
                    shadow-lg shadow-cyan-500/20
                ">

                <img
                    src="{{ asset('images/logo-bengkot.png') }}"
                    class="w-8 h-8 object-contain">
            </div>

            {{-- Brand --}}
            <div>

                <h1 class="text-white font-bold text-2xl leading-tight">
                    Poliklinik
                </h1>

                <p class="text-[11px] text-cyan-300 tracking-[0.18em] uppercase font-medium">
                    Smart Healthcare
                </p>

            </div>

        </div>

        {{-- Role Badge --}}
        <div class="mt-5">

            @if(request()->is('admin*'))

                <span
                    class="
                        inline-flex items-center gap-2
                        px-3 py-1.5 rounded-full
                        bg-cyan-400/10
                        border border-cyan-400/20
                        text-cyan-300
                        text-[11px] font-semibold uppercase tracking-wider
                    ">

                    <span class="w-2 h-2 rounded-full bg-cyan-400"></span>

                    Admin

                </span>

            @elseif(request()->is('dokter*'))

                <span
                    class="
                        inline-flex items-center gap-2
                        px-3 py-1.5 rounded-full
                        bg-purple-400/10
                        border border-purple-400/20
                        text-purple-300
                        text-[11px] font-semibold uppercase tracking-wider
                    ">

                    <span class="w-2 h-2 rounded-full bg-purple-400"></span>

                    Dokter

                </span>

            @elseif(request()->is('pasien*'))

                <span
                    class="
                        inline-flex items-center gap-2
                        px-3 py-1.5 rounded-full
                        bg-amber-400/10
                        border border-amber-400/20
                        text-amber-300
                        text-[11px] font-semibold uppercase tracking-wider
                    ">

                    <span class="w-2 h-2 rounded-full bg-amber-400"></span>

                    Pasien

                </span>

            @endif

        </div>

    </div>


    {{-- ================= MENU ================= --}}
    <div class="flex-1 overflow-y-auto px-4 py-5 custom-scrollbar">

        {{-- ================= ADMIN ================= --}}
        @if(request()->is('admin*'))

            <p
                class="
                    px-2 mb-4
                    text-[11px]
                    font-semibold
                    uppercase
                    tracking-[0.22em]
                    text-cyan-300/80
                ">

                Menu Admin

            </p>

            <div class="space-y-2">

                <a href="{{ route('admin.dashboard') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('admin.dashboard') ? $active : $inactive }}">

                    <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center">
                        <i class="fas fa-gauge-high text-sm"></i>
                    </div>

                    <span>Dashboard Admin</span>

                </a>


                <a href="{{ route('polis.index') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('polis.*') ? $active : $inactive }}">

                    <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center">
                        <i class="fas fa-hospital text-sm"></i>
                    </div>

                    <span>Manajemen Poli</span>

                </a>


                <a href="{{ route('dokter.index') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('dokter.*') ? $active : $inactive }}">

                    <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center">
                        <i class="fas fa-user-md text-sm"></i>
                    </div>

                    <span>Manajemen Dokter</span>

                </a>


                <a href="{{ route('pasien.index') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('pasien.*') ? $active : $inactive }}">

                    <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center">
                        <i class="fas fa-user-injured text-sm"></i>
                    </div>

                    <span>Manajemen Pasien</span>

                </a>


                <a href="{{ route('obat.index') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('obat.*') ? $active : $inactive }}">

                    <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center">
                        <i class="fas fa-pills text-sm"></i>
                    </div>

                    <span>Manajemen Obat</span>

                </a>

            </div>

        @endif


        {{-- ================= PASIEN ================= --}}
        @if(request()->is('pasien*'))

            <p
                class="
                    px-2 mb-4 mt-6
                    text-[11px]
                    font-semibold
                    uppercase
                    tracking-[0.22em]
                    text-cyan-300/80
                ">

                Menu Pasien

            </p>

            <div class="space-y-2">

                <a href="{{ route('pasien.dashboard') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('pasien.dashboard') ? $active : $inactive }}">

                    <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center">
                        <i class="fas fa-house-medical text-sm"></i>
                    </div>

                    <span>Dashboard Pasien</span>

                </a>


                <a href="{{ route('pasien.daftar') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('pasien.daftar') ? $active : $inactive }}">

                    <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center">
                        <i class="fas fa-calendar-plus text-sm"></i>
                    </div>

                    <span>Pendaftaran Periksa</span>

                </a>

            </div>

        @endif


        {{-- ================= DOKTER ================= --}}
        @if(request()->is('dokter*'))

            <p
                class="
                    px-2 mb-4 mt-6
                    text-[11px]
                    font-semibold
                    uppercase
                    tracking-[0.22em]
                    text-cyan-300/80
                ">

                Menu Dokter

            </p>

            <div class="space-y-2">

                <a href="{{ route('dokter.dashboard') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('dokter.dashboard') ? $active : $inactive }}">

                    <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center">
                        <i class="fas fa-stethoscope text-sm"></i>
                    </div>

                    <span>Dashboard Dokter</span>

                </a>


                <a href="{{ route('jadwal-periksa.index') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('jadwal-periksa.*') ? $active : $inactive }}">

                    <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center">
                        <i class="fas fa-calendar-check text-sm"></i>
                    </div>

                    <span>Jadwal Periksa</span>

                </a>


                <a href="{{ route('periksa-pasien.index') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('periksa-pasien.*') ? $active : $inactive }}">

                    <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center">
                        <i class="fas fa-notes-medical text-sm"></i>
                    </div>

                    <span>Periksa Pasien</span>

                </a>


                <a href="{{ route('riwayat-pasien.index') }}"
                    class="{{ $baseLink }} {{ request()->routeIs('riwayat-pasien.*') ? $active : $inactive }}">

                    <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center">
                        <i class="fas fa-clock-rotate-left text-sm"></i>
                    </div>

                    <span>Riwayat Pasien</span>

                </a>

            </div>

        @endif

    </div>


    {{-- ================= LOGOUT ================= --}}
    <div class="p-4 border-t border-white/10">

        <form method="POST" action="/logout">
            @csrf

            <button
                type="submit"
                class="
                    group w-full
                    flex items-center gap-4
                    px-4 py-4 rounded-2xl
                    bg-white/5
                    hover:bg-red-500/15
                    border border-white/10
                    hover:border-red-400/20
                    transition-all duration-300
                ">

                {{-- Icon --}}
                <div
                    class="
                        w-11 h-11 rounded-xl
                        flex items-center justify-center
                        bg-gradient-to-br from-red-500 to-rose-500
                        shadow-lg shadow-red-500/20
                        group-hover:scale-105
                        transition-all duration-300
                    ">

                    <i
                        class="
                            fas fa-right-from-bracket
                            text-white text-sm
                            group-hover:translate-x-0.5
                            transition-all duration-300
                        ">
                    </i>

                </div>

                {{-- Text --}}
                <div class="text-left">

                    <p class="text-sm font-semibold text-white">
                        Keluar Sistem
                    </p>

                    <p class="text-[11px] text-slate-400">
                        Secure Logout
                    </p>

                </div>

            </button>

        </form>

    </div>

</aside>