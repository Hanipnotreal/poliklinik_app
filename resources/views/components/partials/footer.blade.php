<footer
    class="
        bg-white/80
        backdrop-blur-sm
        border-t border-slate-200/70
        px-6 py-4
    ">

    <div
        class="
            flex flex-col md:flex-row
            items-center justify-between
            gap-3
        ">

        {{-- Left --}}
        <div class="flex items-center gap-2 text-sm text-slate-500">

            <div
                class="
                    w-8 h-8 rounded-xl
                    bg-gradient-to-br from-cyan-500 to-blue-600
                    flex items-center justify-center
                    text-white shadow-sm
                ">

                <i class="fas fa-hospital text-xs"></i>

            </div>

            <p>

                © {{ now()->year }}
                <span class="font-semibold text-slate-700">
                    Poliklinik
                </span>

                — All rights reserved.

            </p>

        </div>


        {{-- Right --}}
        <div
            class="
                flex items-center gap-3
                text-xs text-slate-400
            ">

            <span
                class="
                    inline-flex items-center gap-1.5
                    px-3 py-1 rounded-full
                    bg-emerald-50
                    text-emerald-600
                    font-medium
                ">

                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                System Online

            </span>

            <span>
                v1.0.0
            </span>

        </div>

    </div>

</footer>