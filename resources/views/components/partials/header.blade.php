<header
    class="
        sticky top-0 z-40
        h-[72px]
        border-b border-slate-200/70
        bg-white/80
        backdrop-blur-xl
        shadow-sm
    ">

    <div class="flex items-center justify-between h-full px-6">

        {{-- ================= LEFT ================= --}}
        <div class="flex items-center gap-5">

            {{-- Mobile Toggle --}}
            <button
                onclick="toggleSidebar()"
                class="
                    lg:hidden
                    w-11 h-11 rounded-2xl
                    flex items-center justify-center
                    hover:bg-slate-100
                    transition-all duration-200
                ">

                <i data-lucide="menu" class="w-5 h-5 text-slate-700"></i>

            </button>

            {{-- Breadcrumb --}}
            <div class="flex flex-col">

                <div class="flex items-center gap-2 text-sm">

                    <span class="text-slate-400 font-medium">
                        Poliklinik
                    </span>

                    <i
                        data-lucide="chevron-right"
                        class="w-4 h-4 text-slate-300">
                    </i>

                    <span class="font-semibold text-slate-800">
                        {{ $title ?? 'Dashboard' }}
                    </span>

                </div>

                <span
                    class="
                        text-[11px]
                        uppercase
                        tracking-[0.15em]
                        text-cyan-500
                        font-medium
                    ">

                    Sistem Informasi Klinik Modern

                </span>

            </div>

        </div>


        {{-- ================= RIGHT ================= --}}
        <div class="flex items-center gap-3">

            {{-- Fullscreen --}}
            <button
                onclick="toggleFullscreen()"
                class="
                    w-11 h-11 rounded-2xl
                    flex items-center justify-center
                    hover:bg-slate-100
                    transition-all duration-200
                ">

                <i
                    id="fsIcon"
                    class="fas fa-expand text-slate-600 text-sm">
                </i>

            </button>

            {{-- Divider --}}
            <div class="hidden sm:block w-px h-8 bg-slate-200"></div>

            {{-- User Profile --}}
            <div
                class="
                    flex items-center gap-3
                    pl-2 pr-1 py-1.5 rounded-2xl
                    hover:bg-slate-100/80
                    transition-all duration-200
                    cursor-pointer
                ">

                {{-- User Info --}}
                <div class="text-right hidden sm:block">

                    <div class="text-sm font-semibold text-slate-800 leading-tight">
                        {{ auth()->user()->name ?? 'Pengguna' }}
                    </div>

                    <div class="text-xs text-slate-500 leading-tight capitalize">
                        {{ auth()->user()->role ?? 'Admin Sistem' }}
                    </div>

                </div>

                {{-- Avatar --}}
                <div
                    class="
                        relative
                        w-11 h-11 rounded-2xl
                        flex items-center justify-center
                        bg-gradient-to-br from-cyan-400 to-blue-500
                        shadow-lg shadow-cyan-500/20
                    ">

                    <span class="text-sm font-bold text-white">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </span>

                    {{-- Online Indicator --}}
                    <span
                        class="
                            absolute bottom-0 right-0
                            w-3 h-3 rounded-full
                            bg-green-400
                            border-2 border-white
                        ">
                    </span>

                </div>

            </div>

        </div>

    </div>

</header>


<script>
    function toggleFullscreen() {

        const icon = document.getElementById('fsIcon');

        if (!document.fullscreenElement) {

            document.documentElement.requestFullscreen();

            icon.classList.remove('fa-expand');
            icon.classList.add('fa-compress');

        } else {

            document.exitFullscreen();

            icon.classList.remove('fa-compress');
            icon.classList.add('fa-expand');
        }
    }
</script>