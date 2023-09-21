<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate Reports') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="p-6">
            @livewire('export-family-detail')
        </div>
    </div>
</x-app-layout>
