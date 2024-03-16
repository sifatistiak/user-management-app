<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $header }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="card">
            <div class="card-body bg-slate-100 rounded-2xl">
                <div class="float-right mb-2">
                    @if ($all)
                        <a href="{{ route('users.restore.view') }}">
                            <button type="menu"
                                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">
                                Deleted Users
                            </button>
                        </a>
                    @else
                        <a href="{{ route('users.restore.all') }}">
                            <button type="menu"
                                class="text-white bg-green-700 hover:bg-emerald-400 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">
                                Restore All
                            </button>
                        </a>
                    @endif
                </div>
                <div class="pt-5">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    </x-slot>
</x-app-layout>
