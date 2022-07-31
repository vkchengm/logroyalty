<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            R3 Accumulated Production By Land Type and Diameter
        </h2>
    </x-slot>

    <div>
        <div class="mx-auto py-2 sm:px-6 lg:px-8">
            <div class=" md:mt-0 md:col-span-2">
                <livewire:payment-reports.r3-permit-land-used-by-diameter />
            </div>
        </div>
    </div>
</x-app-layout>
