<div>
    {{-- <form method="post" action="{{ route('permits.report') }}"> --}}
    <form>
        @csrf
        
        <div class="shadow overflow-hidden sm:rounded-md">

            {{-- Selections --}}
            <div class="px-6 bg-white pt-4 pb-4">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 ">

                    <div class="px-1">
                        <label for="year" class="block font-medium text-sm text-gray-700">Year</label>
                        <select class="form-control select2 rounded-md shadow-sm mt-1 block w-full" wire:ignore wire:model="selectedYear" >
                            <option value="" selected>
                                All
                            </option>
                            @foreach($yearList as $id => $year)
                              <option value="{{ $year->year }}" {{ ( $id == $selectedYear) ? 'selected' : '' }} >
                                  {{ $year->year }}
                              </option>
                            @endforeach
                        </select>
                    </div>    
                </div>
            </div>


            {{-- Report --}}
            <div class="px-4 bg-white sm:p-6">
            {{-- <div class="px-4 bg-gray-800 text-gray-300 sm:p-6"> --}}
                <div >
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200" id="products_table">
                        <thead>
                        <tr class="break-words text-left">
                            <th class="font-light">Year</th>
                            <th class="font-light">Month</th>
                            <th class="font-light text-right">Helicopter Vol</th>
                            <th class="font-light text-right">RIL Vol</th>
                            <th class="font-light text-right">Non-RIL Vol</th>
                            <th class="font-light text-right">Total Vol</th>
                            <th></th>
                            <th class="font-light text-right">Helicopter RM</th>
                            <th class="font-light text-right">RIL RM</th>
                            <th class="font-light text-right">Non-RIL RM</th>
                            <th class="font-light text-right">Total RM</th>
                            <th></th>
                            
                            {{-- <th class="font-light">Non-RIL</th>
                            <th class="font-light">RIL</th>
                            <th class="font-light">Total</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($permits as $index => $permit)
                                <tr class="break-words">

                                    {{-- <td>
                                        {{ $permit->district->region->name }} 
                                    </td> --}}

                                    {{-- <td>
                                        {{ $permit->district->name }} 
                                    </td> --}}

                                    <td>
                                        {{ $permit->year }} 
                                    </td>

                                    <td>
                                        {{ $permit->month }} 
                                    </td>

                                    <td class="text-right">
                                        {{ number_format($permit->helicopter_vol) }} 
                                    </td>
                                    <td class="text-right">
                                        {{ number_format($permit->ril_vol) }} 
                                    </td>
                                    <td class="text-right">
                                        {{ number_format($permit->non_ril_vol) }} 
                                    </td>
                                    <td class="text-right">
                                        {{ number_format($permit->total_vol) }} 
                                    </td>
                                    <td>
                                    </td>

                                    <td class="text-right">
                                        {{ number_format($permit->helicopter_amount) }} 
                                    </td>
                                    <td class="text-right">
                                        {{ number_format($permit->ril_amount) }} 
                                    </td>
                                    <td class="text-right">
                                        {{ number_format($permit->non_ril_amount) }} 
                                    </td>
                                    <td class="text-right">
                                        {{ number_format($permit->total_amount) }} 
                                    </td>
                                    <td>
                                    </td>


                                    {{-- <td class='text-right'>
                                        {{ number_format($permit->billed_vol) }} 
                                    </td>
                                    <td class='text-right'>
                                        {{ number_format($permit->billed_amount) }} 
                                    </td> --}}


                                </tr>
                                
                            @endforeach
                                <tr>
                                    
                                </tr>
                                {{-- <tr class="text-lg rounded-lg font-semibold"> --}}
                                <tr class="text-lg rounded-lg font-semibold">
                                    <td>
                                        {{-- {{ $permit->year }}  --}}
                                        {{-- <div class="px-2"> --}}
                                            Total
                                        {{-- </div> --}}
                                    </td>

                                    <td>
                                        {{-- {{ $permit->month }}  --}}
                                    </td>

                                    <td class="text-right">
                                        {{-- {{ number_format($permit->helicopter_vol) }}  --}}
                                        {{ $totalHelicopterVol }}
                                    </td>
                                    <td class="text-right">
                                        {{-- {{ number_format($permit->ril_vol) }}  --}}
                                        {{ $totalNonRilVol }}
                                    </td>
                                    <td class="text-right">
                                        {{-- {{ number_format($permit->non_ril_vol) }}  --}}
                                        {{ $totalRilVol }}
                                    </td>
                                    <td class="text-right">
                                        {{-- {{ number_format($permit->total_vol) }}  --}}
                                        {{ $totalVol }}
                                    </td>
                                    <td>

                                    </td>

                                    <td class="text-right">
                                        {{-- {{ number_format($permit->helicopter_amount) }}  --}}
                                        {{ $totalHelicopterAmount }}
                                    </td>
                                    <td class="text-right">
                                        {{-- {{ number_format($permit->ril_amount) }}  --}}
                                        {{ $totalRilAmount }}
                                    </td>
                                    <td class="text-right">
                                        {{-- {{ number_format($permit->non_ril_amount) }}  --}}
                                        {{ $totalRilAmount }}
                                    </td>
                                    <td class="text-right">
                                        {{-- {{ number_format($permit->total_amount) }}  --}}
                                        {{ $totalAmount }}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                    </div>
                    </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
