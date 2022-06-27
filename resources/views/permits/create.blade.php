<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            New Round Logs TDP
        </h2>
    </x-slot>

    <div>
        <div class="mx-auto py-2 sm:px-6 lg:px-8">
            <div class="md:mt-0 md:col-span-2">
                @livewire('permit-create')
            </div>
        </div>
    </div>
</x-app-layout>