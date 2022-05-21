<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Bill Permit - TDP{{ str_pad($permit->id, 6, '0', STR_PAD_LEFT) }}
            {{-- Bill Permit --}}
        </h2>
    </x-slot>

    <div>
        <div class="mx-auto py-5 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                @livewire('permit-bill', ['permit' => $permit])
            </div>
        </div>
    </div>
</x-app-layout>