<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Licensee Details - {{ $licensee->name }}
        </h2>
    </x-slot>

    <div class="px-2 py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Buttons --}}
            <div class="flex items-center py-3">
                <div class="px-2">
                    <a href="{{ route('licensees.index') }}" >
                        <img src="{{ asset('back-arrow-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25">
                    </a>
                </div>

                <div class="px-2">
                    <a href="{{ route('licensees.licenses.create', ['licensee' => $licensee]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">New License</a>
                </div>
                {{-- <div >
                    <a href="{{ route('licensees.index') }}"  class="pr-4">
                        <img src="{{ asset('back-arrow-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25">
                    </a>
                </div> --}}
            </div>

            {{-- <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $licensee->name }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $licensee->type }}
                                    </td>
                                </tr>
                                <tr class="border-b">
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contact No.
                                    </th>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 bg-white divide-y divide-gray-200">
                                        {{ $licensee->contact_no }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- Licenses --}}
            <div class="flex flex-col py-4">
                <div class="py-2 font-bold">Licenses Listing</div>
                <div class="-my-2 sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle min-w-full sm:px-6 lg:px-8">
                        <div class="shadow border-b border-gray-200 sm:rounded-lg divide-y">
                            @foreach ($licensee->licenses as $license)
                                <div class="py-2">
                                    <div class="flex justify-between items-center">
                                        <div class="inline-flex items-center ml-1">
                                            <a class="px-2 cursor-pointer" href="{{ route('licenses.licenseAccCoupe.create', ['license' => $license]) }}">
                                                <img src="{{ asset('button-plus-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25">
                                            </a>

                                            <div class="font-bold">{{ 'License No.: '.$license->name }}</div>
                                        </div>

                                        <div class="flex space-x-2">
                                            <x-jet-secondary-button>
                                                <a href="{{ route('licenses.edit', ['license' => $license]) }}">Edit</a>
                                            </x-jet-secondary-button>

                                            <form method="POST" action="{{ route('licenses.destroy', ['license' => $license]) }}">
                                                @csrf @method('DELETE')

                                                <x-jet-danger-button type="submit" class="mr-2">Delete</x-jet-danger-button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-2 px-3">
                                        @foreach ($license->licenseAccCoupes as $licenseAccCoupe)
                                            <div class="relative m-3 border border-gray-200 rounded p-2 flex" x-data="{hover: false}"
                                                 @mouseover = "hover = true"
                                                 @mouseleave = "hover = false"
                                            >
                                                <div>
                                                    {{ 'Account No.: '.$licenseAccCoupe->account_no }}

                                                    @isset($licenseAccCoupe->coupe_no)
                                                        <br> {{ 'Coupe No.: '.$licenseAccCoupe->coupe_no }}
                                                    @endisset
                                                </div>

                                                <div class="absolute top-0 right-0 mr-2 cursor-pointer">
                                                    <x-jet-dropdown align="right" width="32">
                                                        <x-slot name="trigger">
                                                            <div class="h-5 w-5 mr-0" >
                                                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABmJLR0QA/wD/AP+gvaeTAAACH0lEQVRIia2WPU8UURSGn3PnojbSk80mGCi05BfQEVEC2mCBWRcTCwtN/GApdkMWBAt0t7AyxI9dA5Wx4GMrOkorOhuEKAJWJEjpzD0WApksM7uuw9vNOyfPOfecO3eu0ECj+VIa44YUrgOdQPro1bbAllOttVldfFMc/xHHkCgzky+nPONPOOSugG1UBOBAPnmOsbczT781TXCnUBoUcfPAxSbgeh0ijFSmxpbDphd+yBZmH4hQAS60CAc4D9zq6e3bX19b/XxsnqwgM/Gy36gu1yf9DzlVc7M6/WTpJEEmX04ZE3yh9bbE6Zcf2Mvzzx/tGQAjweQZwgHa27zfRQAZzZfSatwWEa0Zzw7Tle5oSNr4vsts9eMpX8FX53UaleBGFBxAVZuWqkTHCFhj3JAVkf44TFRlrUmvGYXuhJRG6rYKHZGfM8lmAKCQMkJME0k2AwABZ4E9YrZo0hkI7BiBr4koDaSwaZ1qTUT6owKSzgBkxbRZXVTwIytIMAMF3zmzLADZwos5hHtNaS1JX1ee5e7/PYusKwKHZ0g/wGMSwAC8K47vojoMBGcAd6J6u1LM/YTQGbS+trrR09u3D1wl5lf6L3BVfViZzi0cG6dAo4XZARVZANpbhB+oMFKdGquFTVMf9X46t3LOky6BV3G7KywFX9A5P7BX6uGRKwgrky+nPPEHVWRA4JI7urYY2FbYFNVaoHbpw8zjnTjGH9GQzb0HDo2MAAAAAElFTkSuQmCC"/>
                                                            </div>
                                                        </x-slot>

                                                        <x-slot name="content">
                                                            <div class="flex flex-col space-y-2">
                                                                <x-jet-dropdown-link href="{{ route('licenseAccCoupe.edit', ['licenseAccCoupe' => $licenseAccCoupe]) }}">
                                                                    {{ __('Edit') }}
                                                                </x-jet-dropdown-link>

                                                                <form method="POST" action="{{ route('licenseAccCoupe.destroy', ['licenseAccCoupe' => $licenseAccCoupe]) }}">
                                                                    @csrf @method('DELETE')
                                                                    <button type="submit" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                                                                        {{ __('Delete') }}
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </x-slot>
                                                    </x-jet-dropdown>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="flex flex-col py-4">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                @foreach ($licensee->licenses as $license)
                                    <tr class="border-b">
                                        <td>
                                        {{ 'License No.: '.$license->name }}
                                        </td>
                                        <td>
                                            @foreach ($license->licenseAccCoupes as $licenseAccCoupe)
                                                {{ 'Account No.: '.$licenseAccCoupe->account_no }}
                                                @isset($licenseAccCoupe->coupe_no)
                                                    {{ '|   Coupe No.: '.$licenseAccCoupe->coupe_no }}
                                                @endisset
                                                <br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}


            {{-- Permits --}}
            @isset($licensee->user->permits)
            <div class="flex flex-col py-4">
                    <div class="py-2 font-bold"> Permits</div>
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div class="grid grid-cols-6 gap-4">
                                    @foreach ($licensee->user->permits as $permit)
                                        <div>
                                                TDP {{ str_pad($permit->id, 6, '0', STR_PAD_LEFT) }}
                                        </div>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
            {{-- @isset($licensee->user->permits)
                <div class="flex flex-col py-4">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 w-full">
                                    @foreach ($licensee->user->permits as $permit)
                                        <tr class="border-b">
                                            <td>
                                                TDP {{ str_pad($permit->id, 6, '0', STR_PAD_LEFT) }}
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset --}}

        </div>
    </div>
</x-app-layout>
