<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            Internal Users List
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto ">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white dark:bg-stone-700">
                    <a href="{{ route('users.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add User</a>
                </div>
                <div class="bg-white dark:bg-stone-700">
                        <livewire:users-internal-table />
                </div>

            </div>
        </div>
    </div>
</x-app-layout>