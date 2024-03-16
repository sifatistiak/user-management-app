<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Showing - ') . ' (' . $user->name . ')' }}
        </h2>
    </x-slot>
    <div class="flex items-center justify-center">

        <!-- Author card -->
        <div
            class="relative w-full max-w-xl my-8 md:my-16 flex flex-row items-start space-y-4 sm:flex-row sm:space-y-0 sm:space-x-6 px-4 py-8 border-2 border-dashed border-gray-400 shadow-lg rounded-lg">

            <div class="w-full flex justify-center sm:justify-start sm:w-auto">
                <img class="object-cover w-20 h-20 mt-3 mr-3 rounded-full"
                    src="https://www.gravatar.com/avatar/00000000000000000000000000000000">
            </div>

            <div class="w-full sm:w-auto flex flex-col items-center sm:items-start">

                <p class="font-display mb-2 text-2xl font-semibold" itemprop="author">
                    {{ $user->name }}
                </p>


                <div class="flex gap-4">
                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                </div>
            </div>

        </div>

    </div>
</x-app-layout>
