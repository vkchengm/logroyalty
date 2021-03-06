<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
            Permit Details - TDP{{ str_pad($permit->id, 6, '0', STR_PAD_LEFT) }}
        </h2>
    </x-slot>

    <div class="px-2 py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Buttons --}}
            <div class="flex items-center py-3">               
                <div class="px-2">
                    <a href="{{ route('permits.index') }}" >
                        <img src="{{ asset('back-arrow-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25">
                    </a>
                </div>

                @can('applicant_access')
                    @if ($permit->status == "saved" || $permit->status == "rejected" || $permit->status == "disapproved")
                        <a href="{{ route('permits.edit', $permit->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                        <div class="px-1">
                            <form class="inline-block" action="{{ route('permits.destroy', $permit->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="bg-red-600 hover:bg-red-900 text-white font-bold py-2 px-4 rounded" value="Delete">
                            </form>
                        </div>

                        <div class="px-1">
                            <form class="inline-block" action="{{ route('permits.submit', $permit->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" value="Submit">
                            </form>
                        </div>
                    @elseif ($permit->status == "billed")
                        <form class="inline-block" action="{{ route('permits.print', $permit->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" value="Print Bill">
                        </form>
                    @elseif ($permit->status == "paid")
                        <form class="inline-block" action="{{ route('permits.print', $permit->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" value="Print Permit">
                        </form>
                    @endif
                @endcan

                @can('fo_access')
                    @if ($permit->status == "approved")
                        <a href="{{ route('permits.bill', $permit->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Bill</a>
                        <div class="px-1">
                            <button onclick="Livewire.emit('openModal', 'permit-bill-reject', {{ json_encode([$permit]) }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Reject</button>
                        </div>

                    @endif

                    @if ($permit->status == "billed")
                        <button onclick="Livewire.emit('openModal', 'permit-pay', {{ json_encode([$permit]) }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Update Payment</button>
                        
                    @endif

                    @if ($permit->status == "paid")
                        <form class="inline-block" action="{{ route('permits.print', $permit->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" value="Print Permit">
                        </form>
                    @elseif ($permit->status == "billed")
                        <div class="px-2">
                            <form class="inline-block" action="{{ route('permits.print', $permit->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" value="Print Bill">
                            </form>
                        </div>
                    @endif

                @endcan

                {{-- @canany(['dfo_access','adfo_access']) --}}
                @canany(['dfo_access'])
                    @if ($permit->status == "submitted")
                        <button onclick="Livewire.emit('openModal', 'permit-assign', {{ json_encode([$permit]) }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Assign KPPM</button>
                    @endif
                    @if ($permit->status == "accepted")
                        
                        <div class="px-1">
                            <button onclick="Livewire.emit('openModal', 'permit-approve', {{ json_encode([$permit]) }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Approve</button>
                        </div>
        
                        <button onclick="Livewire.emit('openModal', 'permit-disapprove', {{ json_encode([$permit]) }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Disapprove</button>
                    @endif
                @endcan

                @can('kppm_access')
                    @if ($permit->status == "assigned")
                        <div class="px-1">
                            <button onclick="Livewire.emit('openModal', 'permit-accept', {{ json_encode([$permit]) }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Accept</button>
                        </div>
                        <button onclick="Livewire.emit('openModal', 'permit-reject', {{ json_encode([$permit]) }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Reject</button>
                    @endif
                @endcan
            </div>

            {{-- Permit Info --}}
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="table table-bordered table-striped datatable min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Licensee Info
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        District
                                    </th>

                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Type
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Scaling
                                    </th>

                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Hammer Mark
                                    </th>
                                    @if ($permit->status == "paid")
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Validity
                                        </th>
                                    @endif

                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">

                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:bg-stone-600 ">
                                            <div title="Licensee" class="text-sm text-gray-900 dark:text-gray-300 "> <p > {{ $permit->user->licensee->name }} </p> </div>
                                            @isset($permit->license)
                                                <div title="License No." class="text-sm text-gray-900 dark:text-gray-300 "> <p > {{ $permit->license->name }} </p> </div>
                                                <div title="License AC No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->account_no }} </p> </div>
                                                <div title="Coupe No." class="text-sm text-gray-900 dark:text-gray-300 "> <p> {{ $permit->licenseAccount->coupe_no }} </p> </div>
                                            @endisset
                                            
                                            <div title="Receipt No." class="uppercase text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->receipt_no }} </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600 ">
                                            <div title="District" class="text-sm text-gray-900 dark:text-gray-300 ">{{ $permit->district->name ?? '' }} </div>
                                            <div title="DFO" class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->dfo->name ?? '' }} </div>
                                            <div title="KPPM" class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->kppm->name ?? '' }} </div>
                                            <div title="FO" class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->fo->name ?? '' }} </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600 ">
                                            <div title="Land Type" class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->landtype->name ?? '' }} </div>
                                            <div title="Market" class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->market }} </div>
                                            <div title="Logging Method" class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->logging_method }} </div>
                                        </td>
                                        
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600  ">
                                            <div title="Name of Scaler" class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->name_of_scaler }} </div>
                                            <div title="Place of Scaling" class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->place_of_scaling }} </div>
                                            <div title="Scaled Date" class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->scaled_date }} </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600 ">
                                            @isset($permit->hammerMark)
                                                <div title="Hammer Mark" class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->hammerMark->type.$permit->hammerMark->number }} </div>
                                                <div title="Hammer Mark Owner" class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->hammerMark->employee_name }} </div>
                                            @endisset
                                            <div title="Remark" class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->description }} </div>
                                        </td>

                                        @if ($permit->status == "paid")
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600 ">
                                                <div title="Receipt No." class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->receipt_no }} </div>
                                                <div title="Payment Date" class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->payment_date }} </div>
                                                <div title="FCF Receipt No." class="text-sm text-gray-900 dark:text-gray-300 "> {{ $permit->fcf_receipt_no }} </div>
                                            </td>
                                        @endif

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-4">
                    <div class="flex flex-wrap px-6 justify-end text-lg dark:text-gray-300">
                        <div class="px-2">Timber Type: {{ ucfirst($permit->timber_type) }}</div>
                        <div class="px-2">No. of Log: {{ $permit->permitDetails->count() }}</div>
                        <div class="px-2">Volume: {{ number_format($permit->billed_vol, 2) }}m3</div>
                        @cannot('kppm_access')
                            <div class="px-2">Total Royalty: {{ $totalRoyalty ?? '0' }}</div>
                            <div class="px-2">Total Premium: {{ $totalPremium ?? '0' }}</div>
                            <div class="px-2">Amount: {{ number_format($permit->billed_amount, 2) }}</div>
                        @endcannot
                    </div>
            </div>

            {{-- Permit Details --}}
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="table table-bordered table-striped datatable min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Log No.
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Species
                                    </th>

                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Length (M)
                                    </th>
                                    @if ($permit->timber_type == 'converted')
                                        <th title="Diameter 1 / Diameter 2" scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            W / H (cm)
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Area (cm)
                                        </th>
                                    @else
                                        <th title="Diameter 1 / Diameter 2" scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            D1 / D2 (cm)
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Mean (cm)
                                        </th>
                                    @endif

                                    <th title="Defect Symbol" scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        DS
                                    </th>
                                    <th title="Defect Length" scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        DL
                                    </th>
                                    <th title="Defect Diameter" scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        DD
                                    </th>
                                    <th title="Volume in M3" scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Vol.
                                    </th>

                                    @cannot('kppm_access')                                        
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                                            Royalty
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                                            Premium
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                                            Amount
                                        </th>
                                    @endcannot

                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($permitdetails as $permitdetail)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitdetail->log_no }} </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                {{-- <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitdetail->species->name.' ('.$permitdetail->species->type.')' }} </div> --}}
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitdetail->species->name }} </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitdetail->length }} </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitdetail->diameter_1 }} / {{ $permitdetail->diameter_2 }} </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitdetail->mean }} </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitdetail->defect_symbol }} </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitdetail->defect_length }} </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitdetail->defect_diameter }} </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600 text-right">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitdetail->vol }} </div>
                                            </td>

                                            @cannot('kppm_access')                                        
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600 text-right">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitdetail->royalty }} </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600 text-right">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitdetail->premium }} </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600 text-right">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ number_format($permitdetail->amount,2) }} </div>
                                            </td>
                                            @endcannot

                                        </tr>
                                    @endforeach
                                </tbody>

                                {{-- <tfoot class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600 text-right">
                                            <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->permitDetails->sum('vol') }} <div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600 text-right">
                                            <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permit->permitDetails->sum('amount') }} <div>
                                        </td>
                                    </tr>
                                </tfoot> --}}

                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-4">
            </div>

            {{-- Permit Charges --}}
            @if ($permitcharges->count() != 0)
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="table table-bordered table-striped datatable min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                    <tr>
                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Charge Type
                                        </th>
                                        
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Unit
                                        </th>

                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Description
                                        </th>
                                        
                                        <th title="Diameter 1 / Diameter 2" scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                                            Amount
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-right">
                                            Total
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($permitcharges as $permitcharge)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                    <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitcharge->name }} </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                    <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitcharge->unit }} </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                    <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitcharge->description }} </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600 text-right">
                                                    <div class="text-sm text-gray-900 dark:text-gray-300"> {{ number_format($permitcharge->amount,2) }} </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600 text-right">
                                                    <div class="text-sm text-gray-900 dark:text-gray-300"> {{ number_format($permitcharge->total,2) }} </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600 text-right">
                                                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ number_format($permitcharges->sum('total'),2) }} </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif



            {{-- @cannot('kppm_access')
                <div class="flex px-6 py-4 justify-end text-xl dark:text-gray-300">
                    <div class="px-2">No. of Log: {{ $permit->permitDetails->count() }}</div>
                    <div class="px-2">Volume: {{ number_format($permit->billed_vol, 2) }}m3</div>
                    <div class="px-2">Amount: {{ number_format($permit->billed_amount, 2) }}</div>
                </div>
            @endcannot --}}

            {{-- Permit Logs --}}
            @cannot('applicant_access')
                <div class="pt-6 pb-3 px-2 dark:text-gray-300">Transanction History</div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="table table-bordered table-striped datatable min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                    <tr>
                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Datetime
                                        </th>
                                        
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            User
                                        </th>

                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>
                                        
                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Remark
                                        </th>

                                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-300 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            System Information
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($permitlogs as $permitlog)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                    <div class="text-sm text-gray-900 dark:text-gray-300">  {{ $permitlog->updated_at }} </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                    <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitlog->user_name }} </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap uppercase text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                    <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitlog->action }} </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                    <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitlog->remark }} </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300 dark:bg-stone-600">
                                                    <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $permitlog->system_info }} </div>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endcannot


        </div>
    </div>
</x-app-layout>
