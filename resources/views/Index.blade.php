<x-app-layout>
    <div>
        <div class=" mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>
        <x-slot name="head"></x-slot>
    </div>
</x-app-layout>