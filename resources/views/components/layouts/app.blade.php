<!DOCTYPE html>
<html lang="id" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Poliklinik' }}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    {{-- App Assets --}}
    @vite(['resources/js/app.js','resources/css/app.css'])

</head>

<body class="bg-slate-50">

    <div class="min-h-screen flex">

        {{-- SIDEBAR --}}
        <aside
            id="appSidebar"
            class="
                fixed lg:sticky
                top-0 left-0
                h-screen
                w-[280px]
                bg-white
                border-r border-slate-200
                z-40
                transition-all duration-300
                overflow-y-auto
            ">

            @include('components.partials.sidebar')

        </aside>


        {{-- ================= OVERLAY MOBILE ================= --}}
        <div
            id="sidebarOverlay"
            onclick="toggleSidebar()"
            class="
                fixed inset-0 z-40
                bg-black/40 backdrop-blur-sm
                hidden lg:hidden
            ">
        </div>


        {{-- ================= MAIN CONTENT ================= --}}
        <div class="flex-1 flex flex-col min-w-0">

            {{-- HEADER --}}
            @include('components.partials.header')


            {{-- ================= PAGE CONTENT ================= --}}
            <main class="flex-1 overflow-y-auto">

                <div class="p-4 lg:p-6">

                    {{-- ALERT SUCCESS --}}
                    @if(session('success'))

                        <div
                            class="
                                mb-5
                                flex items-center gap-3
                                rounded-2xl
                                border border-emerald-200
                                bg-emerald-50
                                px-5 py-4
                                text-emerald-700
                                shadow-sm
                            ">

                            <i class="fas fa-circle-check text-emerald-500"></i>

                            <span class="text-sm font-medium">
                                {{ session('success') }}
                            </span>

                        </div>

                    @endif


                    {{-- ALERT ERROR --}}
                    @if(session('error'))

                        <div
                            class="
                                mb-5
                                flex items-center gap-3
                                rounded-2xl
                                border border-red-200
                                bg-red-50
                                px-5 py-4
                                text-red-700
                                shadow-sm
                            ">

                            <i class="fas fa-circle-xmark text-red-500"></i>

                            <span class="text-sm font-medium">
                                {{ session('error') }}
                            </span>

                        </div>

                    @endif


                    {{-- ================= PAGE WRAPPER ================= --}}
                    <div
                        class="
                            rounded-[28px]
                            bg-white
                            border border-slate-200/70
                            shadow-sm
                            min-h-[calc(100vh-160px)]
                            p-5 lg:p-7
                        ">

                        {{ $slot }}

                    </div>

                </div>

            </main>


            {{-- ================= FOOTER ================= --}}
            @include('components.partials.footer')

        </div>

    </div>


    {{-- ================= SCRIPT ================= --}}
    <script>

        function toggleSidebar() {

            const sidebar = document.getElementById('appSidebar');
            const overlay = document.getElementById('sidebarOverlay');

            sidebar.classList.toggle('-translate-x-full');

            overlay.classList.toggle('hidden');
        }


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

    @stack('scripts')

</body>

</html>