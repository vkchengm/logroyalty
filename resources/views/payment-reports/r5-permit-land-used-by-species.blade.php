<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            R5 Permit By Land, Volume and Species
        </h2>
    </x-slot>

    <div>
        <div class="mx-auto py-2 sm:px-6 lg:px-8">
            <div class=" md:mt-0 md:col-span-2">
                <livewire:payment-reports.r5-permit-land-used-by-species />
            </div>
        </div>
    </div>
</x-app-layout>
