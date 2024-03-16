<x-app-layout>
    {{-- <x-slot name="styles">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    </x-slot> --}}
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
