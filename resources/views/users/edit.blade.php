<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') . " (" . $user->name . ")" }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center">
        <div
            class="w-full max-w-2xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

            @if ($errors->any())
                <div class="alert alert-danger" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="space-y-6" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Name
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        value="{{ $user->name }}"
                        placeholder="Full Name" required />
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="email" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        value="{{ $user->email }}"
                        placeholder="mail@example.com" required />
                </div>

                <div>
                    
                    <img class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="{{ url('storage/avatars/' . $user->avatar) }}" alt="Bordered avatar">

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        User avatar
                    </label>
                    <input type="file" accept="image/*" name="avatar" id="avatar"
                        class="block w-full text-sm text-slate-500
                                                    file:mr-4 file:py-2 file:px-4
                                                    file:rounded-full file:border-0
                                                    file:text-sm file:font-semibold
                                                    file:bg-violet-50 file:text-violet-700
                                                    hover:file:bg-violet-100
                                                    " />
                </div>

                <button type="submit"
                    class="bg-emerald-300	hover:bg-emerald-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
