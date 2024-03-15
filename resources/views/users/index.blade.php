<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Users') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="card">
            <div class="card-body bg-slate-100">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    </x-slot>
</x-app-layout>
