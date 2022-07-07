<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight  dark:text-gray-300">
            Edit Permit - TDP{{ str_pad($permit->id, 6, '0', STR_PAD_LEFT) }} - {{ strtoupper($permit->timber_type) }}
        </h2>
    </x-slot>

    <div>
        <div class="mx-auto py-2 sm:px-6 lg:px-8">
            <div class="md:mt-0 md:col-span-2">
                @livewire('permit-edit', ['permit' => $permit])
            </div>
        </div>
    </div>
</x-app-layout>