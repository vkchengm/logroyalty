<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-300 leading-tight">
            R1: RIL, Non-RIL & Helicopter Report
        </h2>
    </x-slot>

    <div>
        {{-- <div class="max-w-4xl mx-auto py-2 sm:px-6 lg:px-8"> --}}

        <div class=" mx-auto py-2 sm:px-6 lg:px-8">
            <div class=" md:mt-0 md:col-span-2">
                @livewire('report-r1-permit-logging-method')
            </div>
        </div>
    </div>
</x-app-layout>