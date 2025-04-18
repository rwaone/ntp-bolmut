<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group w-0 hidden xl:w-[248px] xl:block">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">

        <!-- Application Logo -->
        <x-application-logo />

        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl inline-block md:hidden">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow"
        class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0">
    </div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] z-50" id="sidebar_menus">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">{{ __('MENU') }}</li>
            <li>
                <a href="{{ route('dashboard.index') }}"
                    class="navItem {{ request()->is('dashboard*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>{{ __('Dashboard') }}</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('responses.index') }}"
                    class="navItem {{ request()->is('responses*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="material-symbols:keyboard-external-input"></iconify-icon>
                        <span>{{ __('Entri Data') }}</span>
                    </span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('pemeriksaan.index') }}" class="navItem {{ request()->is('pemeriksaan*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="mdi:print-preview"></iconify-icon>
                        <span>{{ __('Pemeriksaan Data') }}</span>
                    </span>
                </a>
            </li> --}}
            <li>
                <a href="{{ route('export.index') }}"
                    class="navItem {{ request()->is('export*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="material-symbols:export-notes"></iconify-icon>
                        <span>{{ __('Ekspor Data') }}</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('analytics.index') }}"
                    class="navItem {{ request()->is('analytics*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="icon-park-outline:analysis"></iconify-icon>
                        <span>{{ __('Analisis Data') }}</span>
                    </span>
                </a>
            </li>
            <li class="sidebar-menu-title">{{ __('MASTER') }}</li>
            <!-- Wilayah -->
            <li>
                <a href="{{ route('wilayah.index') }}"
                    class="navItem {{ request()->is('master/wilayah*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="oui:vis-map-region"></iconify-icon>
                        <span>{{ __('Wilayah') }}</span>
                    </span>
                </a>
            </li>
            <!-- Sample -->
            <li>
                <a href="{{ route('samples.index') }}"
                    class="navItem {{ request()->is('master/samples*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="mdi:person-multiple"></iconify-icon>
                        <span>{{ __('Sample') }}</span>
                    </span>
                </a>
            </li>
            <!-- Petugas -->
            <li>
                <a href="{{ route('petugas.index') }}"
                    class="navItem {{ request()->is('petugas*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="fluent:person-note-16-filled"></iconify-icon>
                        <span>{{ __('Petugas') }}</span>
                    </span>
                </a>
            </li>
            <!-- Dokumen -->
            <li>
                <a href="{{ route('documents.index') }}"
                    class="navItem {{ request()->is('documents*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="oui:documents"></iconify-icon>
                        <span>{{ __('Document') }}</span>
                    </span>
                </a>
            </li>
            <!-- Section -->
            <li>
                <a href="{{ route('sections.index') }}"
                    class="navItem {{ request()->is('sections*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="uis:web-section-alt"></iconify-icon>
                        <span>{{ __('Section') }}</span>
                    </span>
                </a>
            </li>
            <!-- Group -->
            <li>
                <a href="{{ route('groups.index') }}" class="navItem {{ request()->is('groups*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="fa6-solid:layer-group"></iconify-icon>
                        <span>{{ __('Group') }}</span>
                    </span>
                </a>
            </li>
            <!-- Komoditas -->
            <li>
                <a href="{{ route('komoditas.index') }}"
                    class="navItem {{ request()->is('komoditas*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="ph:plant-fill"></iconify-icon>
                        <span>{{ __('Komoditas') }}</span>
                    </span>
                </a>
            </li>
            <!-- Quality -->
            <li>
                <a href="{{ route('kualitas.index') }}"
                    class="navItem {{ request()->is('kualitas*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="carbon:rule-data-quality"></iconify-icon>
                        <span>{{ __('Kualitas') }}</span>
                    </span>
                </a>
            </li>
            <li class="sidebar-menu-title">{{ __('SETTINGS') }}</li>
            <!-- Database -->
            {{-- <li>
                <a href="{{ route('database-backups.index') }}"
                    class="navItem {{ request()->is('database-backups*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="iconoir:database-backup"></iconify-icon>
                        <span>{{ __('Database Backup') }}</span>
                    </span>
                </a>
            </li> --}}
            <!-- Settings -->
            <li>
                <a href="{{ route('general-settings.show') }}"
                    class="navItem {{ request()->is('general-settings*') || request()->is('roles*') || request()->is('profiles*') || request()->is('permissions*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="material-symbols:settings-outline"></iconify-icon>
                        <span>{{ __('Settings') }}</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}" class="navItem {{ request()->is('users*') ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="mdi:users-group-outline"></iconify-icon>
                        <span>{{ __('Users') }}</span>
                    </span>
                </a>
            </li>
        </ul>
        <!-- Upgrade Your Business Plan Card Start -->
        {{-- <div class="bg-slate-900 mb-10 mt-24 p-4 relative text-center rounded-2xl text-white" id="sidebar_bottom_wizard">
            <img src="/images/svg/rabit.svg" alt="" class="mx-auto relative -mt-[73px]">
            <div class="max-w-[160px] mx-auto mt-6">
                <div class="widget-title font-Inter mb-1">Unlimited Access</div>
                <div class="text-xs font-light font-Inter">
                    Upgrade your system to business plan
                </div>
            </div>
            <div class="mt-6">
                <button class="bg-white hover:bg-opacity-80 text-slate-900 text-sm font-Inter rounded-md w-full block py-2 font-medium">
                    Upgrade
                </button>
            </div>
        </div> --}}
    </div>
</div>
<!-- End: Sidebar -->
