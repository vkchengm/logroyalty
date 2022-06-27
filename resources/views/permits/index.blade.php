<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Timber Disposal Permit') }}
        </h2>
    </x-slot>

    <div class="px-2 py-1">
        <div class="max-w-6xl mx-auto py-4 sm:px-6 lg:px-8 dark:text-gray-200">
            @can('applicant_access')
                @if (auth()->user()->is_activated == true)
                    <div class="flex flex-wrap">
                        {{-- <div class="flex-auto px-2"><a href="{{ route('permits.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">New TDP - Round logs</a></div>
                        <div class="flex-auto px-2"><a href="{{ route('permits.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">New TDP - Plantation</a></div>
                        <div class="flex-auto px-2"><a href="{{ route('permits.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">New TDP - Converted Logs</a></div> --}}
                        <div class="px-1 py-1">
                            <div class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><a href="{{ route('permits.create') }}">New Round Logs</a></div>
                        </div>
                        <div class="px-1 py-1">
                            <div class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><a href="{{ route('permits.create-plantation') }}">New Plantation Logs</a></div>
                        </div>
                        {{-- <div class="px-1 py-1">
                            <div class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><a href="{{ route('permits.create-converted') }}">New Converted Logs</a></div>
                        </div> --}}
                    </div>
                @else
                    <div class="py-4 text-center">
                        This account needs to be activated!  Please contact the Administrator, Thank you!
                    </div>                  
                @endif
            @endcan

            {{-- Saved, Rejected & Disapproved --}}
            @can('applicant_access')
            @if (count($permitsSaved) !== 0)
            <div class="flex flex-col py-2">
                <span class="flex py-4 ">
                    <div class="px-2"><img src="{{ asset('work-item-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25"></div>
                    <p class="font-semibold ">Saved applications - ready for submission</p>
                </span>

                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="table table-bordered table-striped datatable min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-gray-500 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium uppercase tracking-wider">
                                        License No.
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-gray-500 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium uppercase tracking-wider">
                                        District
                                    </th>

                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-gray-500 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium uppercase tracking-wider">
                                        Description
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-gray-500 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium uppercase tracking-wider">
                                        Market/Land Type
                                    </th>

                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-gray-500 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium uppercase tracking-wider">
                                        Status
                                    </th>


                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 ">
                                        
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($permitsSaved as $permit)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600 dark:text-gray-300 ">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300 font-semibold"> TDP{{ str_pad($permit->id, 6, '0', STR_PAD_LEFT) }} </div>
                                                @isset($permit->license)
                                                    <div title="License No." class="text-sm text-gray-900 dark:text-gray-300 "> <p > {{ $permit->license->name }} </p> </div>
                                                    <div title="License AC No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->account_no }} </p> </div>
                                                    <div title="Coupe No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->coupe_no }} </p> </div>
                                                @endisset
                                                {{-- <div class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->license_no }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->licensee_ac_no }} </div> --}}
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600 dark:text-gray-300">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300">{{ $permit->district->name ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->dfo->name ?? '' }} / {{ $permit->kppm->name ?? '' }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600 dark:text-gray-300">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->description }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->scaled_date }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600 dark:text-gray-300">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->landtype->description ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->market }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600 dark:text-gray-300">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ ucwords($permit->status) ?? '' }} </div>
                                                <div title="No. of logs" class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->permitDetails->count() ?? '' }} </div>
                                                {{-- <div class="text-sm text-gray-400"> {{ $permit->market }} </div> --}}
                                            </a>
                                        </td>

                                        <td class="dark:bg-stone-600 dark:text-gray-300">
                                        
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endcan

            {{-- Submitted --}}
            @canany(['applicant_access', 'dfo_access', 'adfo_access', 'ppw_access', 'tppw_access'])
            @if (count($permitsSubmitted) !== 0)
            <div class="flex flex-col py-2">
                <span class="flex py-4 ">
                    @canany(['dfo_access','adfo_access'])
                        <div class="px-2"><img src="{{ asset('work-item-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25"></div>
                    @endcan

                    <p class="font-semibold">Submitted applications - ready for assignment</p>
                </span>

                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="table table-bordered table-striped datatable min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        License No.
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        District
                                    </th>

                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Market/Land Type
                                    </th>

                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($permitsSubmitted as $permit)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300 font-semibold"> TDP {{ str_pad($permit->id, 6, '0', STR_PAD_LEFT) }} </div>
                                                @isset($permit->license)
                                                    <div title="License No." class="text-sm text-gray-900 dark:text-gray-300 "> <p > {{ $permit->license->name }} </p> </div>
                                                    <div title="License AC No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->account_no }} </p> </div>
                                                    <div title="Coupe No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->coupe_no }} </p> </div>
                                                @endisset
                                                {{-- <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->license_no }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->licensee_ac_no }} </div> --}}
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300">{{ $permit->district->name ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->dfo->name ?? '' }} / {{ $permit->kppm->name ?? '' }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->description }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->scaled_date }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->landtype->description ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->market }} </div>
                                            </a>
                                        </td>

                                        <td class=" dark:bg-stone-600">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endcanany

            {{-- Assigned --}}
            @cannot('fo_access')
            @if (count($permitsAssigned) !== 0)
            <div class="flex flex-col py-2">
                <span class="flex py-4 ">
                    @can('kppm_access')
                        <div class="px-2"><img src="{{ asset('work-item-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25"></div>
                    @endcan
                    <p class="font-semibold">Assigned applications - ready for inspection</p>
                </span>

                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="table table-bordered table-striped datatable min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        License No.
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        District
                                    </th>

                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Market/Land Type
                                    </th>

                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 ">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($permitsAssigned as $permit)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300 font-semibold"> TDP {{ str_pad($permit->id, 6, '0', STR_PAD_LEFT) }} </div>
                                                @isset($permit->license)
                                                    <div title="License No." class="text-sm text-gray-900 dark:text-gray-300 "> <p > {{ $permit->license->name }} </p> </div>
                                                    <div title="License AC No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->account_no }} </p> </div>
                                                    <div title="Coupe No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->coupe_no }} </p> </div>
                                                @endisset
                                                {{-- <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->license_no }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->licensee_ac_no }} </div> --}}
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300">{{ $permit->district->name ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->dfo->name ?? '' }} / {{ $permit->kppm->name ?? '' }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->description }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->scaled_date }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->landtype->description ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->market }} </div>
                                            </a>
                                        </td>

                                        <td class="dark:bg-stone-600">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endcannot

            {{-- Accepted --}}
            @cannot('fo_access')
            @if (count($permitsAccepted) !== 0)
            <div class="flex flex-col py-2">
                <span class="flex py-4">
                    @can('dfo_access')
                        <div class="px-2"><img src="{{ asset('work-item-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25"></div>
                    @endcan
                    <p class="font-semibold">Inspection accepted applications - pending for approval</p>
                </span>

                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="table table-bordered table-striped datatable min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        License No.
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        District
                                    </th>

                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Market/Land Type
                                    </th>

                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 ">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($permitsAccepted as $permit)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300 font-semibold"> TDP {{ str_pad($permit->id, 6, '0', STR_PAD_LEFT) }} </div>
                                                @isset($permit->license)
                                                    <div title="License No." class="text-sm text-gray-900 dark:text-gray-300 "> <p > {{ $permit->license->name }} </p> </div>
                                                    <div title="License AC No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->account_no }} </p> </div>
                                                    <div title="Coupe No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->coupe_no }} </p> </div>
                                                @endisset
                                                {{-- <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->license_no }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->licensee_ac_no }} </div> --}}
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300">{{ $permit->district->name ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->dfo->name ?? '' }} / {{ $permit->kppm->name ?? '' }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->description }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->scaled_date }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->landtype->description ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->market }} </div>
                                            </a>
                                        </td>

                                        <td class="dark:bg-stone-600">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endcannot

            {{-- Approved --}}
            @if (count($permitsApproved) !== 0)
            <div class="flex flex-col py-2">
                <span class="flex py-4 ">
                    @can('fo_access')
                        <div class="px-2"><img src="{{ asset('work-item-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25"></div>
                    @endcan
                    <p class="font-semibold">Approved applications - ready for billing</p>
                </span>

                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="table table-bordered table-striped datatable min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        License No.
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        District
                                    </th>

                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Market/Land Type
                                    </th>

                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 ">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($permitsApproved as $permit)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300 font-semibold"> TDP {{ str_pad($permit->id, 6, '0', STR_PAD_LEFT) }} </div>
                                                @isset($permit->license)
                                                    <div title="License No." class="text-sm text-gray-900 dark:text-gray-300 "> <p > {{ $permit->license->name }} </p> </div>
                                                    <div title="License AC No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->account_no }} </p> </div>
                                                    <div title="Coupe No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->coupe_no }} </p> </div>
                                                @endisset
                                                {{-- <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->license_no }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->licensee_ac_no }} </div> --}}
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300">{{ $permit->district->name ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->dfo->name ?? '' }} / {{ $permit->kppm->name ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->fo->name ?? '' }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->description }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->scaled_date }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->landtype->description ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->market }} </div>
                                            </a>
                                        </td>


                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:bg-stone-600">
                                        </td>

                                        {{-- <td class="dark:bg-stone-600">
                                        </td> --}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- Billed --}}
            @if (count($permitsBilled) !== 0)
            <div class="flex flex-col py-2">
                <span class="flex py-4 ">
                    @can('fo_access')
                        <div class="px-2"><img src="{{ asset('work-item-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25"></div>
                    @endcan
                    <p class="font-semibold">Billed applications - waiting for payment</p>
                </span>

                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="table table-bordered table-striped datatable min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        License No.
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        District
                                    </th>

                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Market/Land Type
                                    </th>

                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 ">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($permitsBilled as $permit)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300 font-semibold"> TDP {{ str_pad($permit->id, 6, '0', STR_PAD_LEFT) }} </div>
                                                @isset($permit->license)
                                                    <div title="License No." class="text-sm text-gray-900 dark:text-gray-300 "> <p > {{ $permit->license->name }} </p> </div>
                                                    <div title="License AC No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->account_no }} </p> </div>
                                                    <div title="Coupe No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->coupe_no }} </p> </div>
                                                @endisset
                                                {{-- <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->license_no }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->licensee_ac_no }} </div> --}}
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300">{{ $permit->district->name ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->dfo->name ?? '' }} / {{ $permit->kppm->name ?? '' }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->description }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->scaled_date }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->landtype->description ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->market }} </div>
                                            </a>
                                        </td>

                                        <td class="dark:bg-stone-600">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            {{-- Paid --}}
            @if (count($permitsPaid) !== 0)
            <div class="flex flex-col py-2">
                <span class="py-4 "><p class="font-semibold">Paid applications - Permit Issued</p></span>

                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="table table-bordered table-striped datatable min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        License No.
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        District
                                    </th>

                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Market/Land Type
                                    </th>

                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300" >

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($permitsPaid as $permit)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300 font-semibold"> TDP {{ str_pad($permit->id, 6, '0', STR_PAD_LEFT) }} </div>
                                                @isset($permit->license)
                                                    <div title="License No." class="text-sm text-gray-900 dark:text-gray-300 "> <p > {{ $permit->license->name }} </p> </div>
                                                    <div title="License AC No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->account_no }} </p> </div>
                                                    <div title="Coupe No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->coupe_no }} </p> </div>
                                                @endisset
                                                {{-- <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->license_no }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->licensee_ac_no }} </div> --}}
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300">{{ $permit->district->name ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->dfo->name ?? '' }} / {{ $permit->kppm->name ?? '' }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->description }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->scaled_date }} </div>
                                            </a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600">
                                            <a href="{{ route('permits.show', $permit->id) }}">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->landtype->description ?? '' }} </div>
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->market }} </div>
                                            </a>
                                        </td>

                                        <td class="dark:bg-stone-600">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @endif


 

        </div>
    </div>


        </div>
    </div>



                



            
      



</x-app-layout>
