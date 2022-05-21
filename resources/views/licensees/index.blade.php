<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            Licensees List
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 bg-white dark:bg-stone-700">
                    <a href="{{ route('licensees.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Licensee</a>
                </div>
                <div class="bg-white dark:bg-stone-700">
                        <livewire:licensees-table />
                </div>

            </div>
        </div>
    </div>
</x-app-layout>