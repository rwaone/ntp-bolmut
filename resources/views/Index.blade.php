<x-app-layout>
    <div>
        <div class=" mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        <x-slot name="head"></x-slot>
    </div>
    <div class="grid grid-cols-12">
        <div class="col-span-12">
            <div class="bg-no-repeat bg-cover bg-center p-4 rounded-[6px] relative" style="background-image: url(images/all-img/widget-bg-1.png)">
                <div>
                    <div class="text-large font-medium text-slate-900 mb-2">
                        Selamat Datang di Aplikasi Pengolahan Data Harga Perdesaan (NTP)
                    </div>
                    <p class="text-sm text-slate-800">
                        Kabupaten Bolaang Mongondow Utara
                    </p>
                </div>
                <div class="absolute top-1/2 -translate-y-1/2 ltr:right-6 rtl:left-6 mt-2 h-12 w-12 bg-white rounded-full text-xs font-medium
                        flex flex-col items-center justify-center">
                    
                </div>
            </div>
        </div>
</x-app-layout>