<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome') }}
        </h2>
    </x-slot>

    <div class="px-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-gray-300">
            <div class="flex flex-col">
                <div class="py-4">Welcome to Sabah Forestry - Logs Royalty Appilcation</div>

                <div class="font-bold py-4">
                    Announcement....
                </div>
                <div class="font-bold py-4">
                    News....
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
