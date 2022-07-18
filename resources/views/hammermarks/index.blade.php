<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Hammer Marks List
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="py-4 bg-white dark:bg-stone-700">
                    <a href="{{ route('hammermarks.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Hammer Mark</a>
                </div>

                <div class="bg-white dark:bg-stone-700">
                        <livewire:hammer-marks-table />
                    {{-- @livewire('hammermarks-table') --}}

                </div>

            </div>
        </div>
    </div>


</x-app-layout>
