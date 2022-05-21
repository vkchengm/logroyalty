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
                    <a href="{{ route('licenses.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">New License</a>
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
                <div class="pt-2 font-bold">Licenses Listing</div>
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            @foreach ($licensee->licenses as $license)
                                <div class="py-2">
                                    <div class="flex"> 
                                        <div class="pb-1 px-2"><img src="{{ asset('button-plus-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25"></div>
                                        <div class="font-bold">{{ 'License No.: '.$license->name }}</div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-2">
                                        @foreach ($license->licenseAccCoupes as $licenseAccCoupe)
                                            <div>
                                                {{ 'Account No.: '.$licenseAccCoupe->account_no }} 
                                                @isset($licenseAccCoupe->coupe_no)
                                                    <br> {{ 'Coupe No.: '.$licenseAccCoupe->coupe_no }} 
                                                @endisset
                                                {{-- <br> --}}
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
