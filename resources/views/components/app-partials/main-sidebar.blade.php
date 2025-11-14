<div class="main-sidebar">
    <div
        class="flex h-full w-full flex-col items-center border-r border-slate-150 bg-white">
        <!-- Application Logo -->
        <div class="flex pt-4">
            <a href="/">
                <img class="h-11 w-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]"
                    src="{{ asset('images/app-logo.png') }}" alt="logo" />
            </a>
        </div>

        <!-- Main Sections Links -->
        <div class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto pt-6">
            <!-- Dashboards -->
            <a href="/"
                class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'index' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 bg-primary/10' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25' }}"
                x-tooltip.placement.right="'Dashboards'">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
                </svg>
            </a>

            <!-- Keuangan -->
            <a href="{{ route('dbp') }}"
                class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'dbp' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 bg-primary/10' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25' }}"
                x-tooltip.placement.right="'DBP'">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11H4m15.5 5a.5.5 0 0 0 .5-.5V8a1 1 0 0 0-1-1h-3.75a1 1 0 0 1-.829-.44l-1.436-2.12a1 1 0 0 0-.828-.44H8a1 1 0 0 0-1 1M4 9v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-3.75a1 1 0 0 1-.829-.44L9.985 8.44A1 1 0 0 0 9.157 8H5a1 1 0 0 0-1 1Z"/>
                </svg>
            </a>

            <!-- Persuratan -->
            <a href="{{ route('persuratan') }}"
                class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'persuratan' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 bg-primary/10' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25' }}"
                x-tooltip.placement.right="'Mutasi'">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-4m5-13v4a1 1 0 0 1-1 1H5m0 6h9m0 0-2-2m2 2-2 2"/>
                </svg>
            </a>

            <!-- Publikasi -->
            <a href="{{ route('publikasi') }}"
                class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'publikasi' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 bg-primary/10' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25' }}"
                x-tooltip.placement.right="'Penambahan'">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h4M9 3v4a1 1 0 0 1-1 1H4m11 6v4m-2-2h4m3 0a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z"/>
                </svg>
            </a>

<!-- Publikasi -->
            <a href="{{ route('publikasi') }}"
                class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'publikasi' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 bg-primary/10' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25' }}"
                x-tooltip.placement.right="'Usulan Penghapusan'">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                </svg>
            </a>

            <!-- Publikasi -->
            <a href="{{ route('publikasi') }}"
                class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 {{ $routePrefix === 'publikasi' ? 'text-primary hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 bg-primary/10' : 'hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25' }}"
                x-tooltip.placement.right="'Inventarisasi'">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 7 2 2 4-4m-5-9v4h4V3h-4Z"/>
                </svg>
            </a>

        </div>

        <!-- Bottom Links -->
        <div class="flex flex-col items-center space-y-3 py-3">

            <!-- Profile -->
            <div x-data="usePopper({ placement: 'right-end', offset: 12 })" @click.outside="if(isShowPopper) isShowPopper = false" class="flex">
                <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="avatar h-12 w-12">
                    <img class="rounded-full" src="/uploads/images/{{ auth()->user()->profil_pict }}" alt="avatar" />
                    <span
                        class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-success"></span>
                </button>
                <div :class="isShowPopper && 'show'" class="popper-root fixed" x-ref="popperRoot">
                    <div
                        class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft">
                        <div class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4">
                            <div class="avatar h-14 w-14">
                                <img class="rounded-full" src="/uploads/images/{{ auth()->user()->profil_pict }}"
                                    alt="avatar" />
                            </div>
                            <div>
                                <a href="{{ route('profil') }}"
                                    class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary">
                                    {{ auth()->user()->name }}
                                </a>
                                
                            </div>
                        </div>
                        <div class="flex flex-col pt-2 pb-5">
                            <a href="{{ route('profil') }}"
                                class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100">
                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-warning text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>

                                <div>
                                    <h2
                                        class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary">
                                        Profil
                                    </h2>
                                    <div class="text-xs text-slate-400 line-clamp-1">
                                        Pengaturan Profil
                                    </div>
                                </div>
                            </a>

                            <div class="mt-3 px-4">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span>Logout</span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
