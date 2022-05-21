<div>
    {{-- <form method="post" action="{{ route('permits.report') }}"> --}}
    <form>
        @csrf
        
        <div class="shadow overflow-hidden sm:rounded-md">

            {{-- Selections --}}
            <div class="px-6 bg-white dark:bg-stone-800 dark:text-gray-700 pt-4 pb-4">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 ">

                    <div class="px-1 ">
                        <label for="year" class="block font-medium text-sm text-gray-700 dark:text-white ">Year</label>
                        <select class="form-control select2 rounded-md shadow-sm mt-1 block w-full" wire:ignore wire:change="changeOption()" wire:model="yearSelected" >
                            <option value="" selected>
                                All
                            </option>
                            @foreach($yearList as $id => $year)
                              <option value="{{ $year->year }}" {{ ( $id == $yearSelected) ? 'selected' : '' }}">
                                  {{ $year->year }}
                              </option>
                            @endforeach
                        </select>
                          @if($errors->has('yearSelected'))
                              <p class="help-block">
                                  {{ $errors->first('yearSelected') }}
                              </p>
                          @endif
                    </div>    

                    <div class="px-1">
                        <label for="Regions" class="block font-medium text-sm text-gray-700 dark:text-white">Region</label>
                        <select class="form-control select2 rounded-md shadow-sm mt-1 block w-full" wire:change="changeRegion()" wire:model="regionId" >
                        <option value="" selected>
                            All
                        </option>
                        @foreach($regions as $id => $region)
                                <option value="{{ $region->id }}">
                                    {{ $region->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>    

                    <div class="px-1">
                        <label for="districts" class="block font-medium text-sm text-gray-700 dark:text-white">District</label>
                        <select class="form-control select2 rounded-md shadow-sm mt-1 block w-full" wire:change="changeOption()" wire:model="districtId" >
                        <option value="" selected>
                            All
                        </option>
                        @foreach($districts as $id => $district)
                                <option value="{{ $district->id }}">
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>    

                    <div class="px-1">
                        <label for="landtypes" class="block font-medium text-sm text-gray-700 dark:text-white">Land Type</label>
                        <select name="land_type_id" id="land_type_id" class="form-control select2 rounded-md shadow-sm mt-1 block w-full" wire:change="changeOption()" wire:model="landTypeId" >
                            <option value="" selected>
                                All
                            </option>
                            @foreach($landtypes as $id => $landtype)
                              <option value="{{ $id }}" {{ (isset($tdp) && $tdp->landtype ? $tdp->landtype->id : old('land_type_id')) == $id ? 'selected' : '' }}>
                                  {{ $landtype }}
                              </option>
                            @endforeach
                        </select>
                          @if($errors->has('land_type_id'))
                              <p class="help-block">
                                  {{ $errors->first('land_type_id') }}
                              </p>
                          @endif
                    </div>    

                    <div class="px-1">
                        <label for="logging_method" class="block font-medium text-sm text-gray-700 dark:text-white">Logging method</label>
                        <select name="logging_method" id="logging_method" class="form-control select2 rounded-md shadow-sm mt-1 block w-full" wire:change="changeOption()" wire:model="loggingMethod" >
                                <option value="" selected>
                                  All
                                </option>
                                <option>
                                    Non-RIL
                                </option>
                                <option>
                                    RIL
                                </option>
                                <option>
                                    Helicopter
                                </option>
                        </select>
                        @if($errors->has('logging_method'))
                            <p class="help-block">
                                {{ $errors->first('logging_method') }}
                            </p>
                        @endif
                    </div>    

                    <div class="px-1">
                        <label for="market" class="block font-medium text-sm text-gray-700 dark:text-white">Market</label>
                        <select name="market" id="market" class="form-control select2 rounded-md shadow-sm mt-1 block w-full" wire:change="changeOption()" wire:model="market" >
                           <option value="" selected>
                             All
                           </option>
                           <option value="Export">
                                Export
                            </option>
                            <option value="Local Processing">
                                Local Processing
                            </option>
                        </select>
                        @if($errors->has('market'))
                            <p class="help-block">
                                {{ $errors->first('market') }}
                            </p>
                        @endif
                    </div>    

                    {{-- <div class="px-1">
                        <label for="tdp" class="block font-medium text-sm text-gray-700 dark:text-white">TDP</label>
                        <select name="tdp" id="tdp" class="form-control select2 rounded-md shadow-sm mt-1 block w-full" wire:change="changeOption()"  >
                           <option value="" selected>
                             All
                           </option>
                           <option value="Export">
                                Export
                            </option>
                            <option value="Local Processing">
                                Local Processing
                            </option>
                        </select>
                    </div>  --}}
                    
                    
                </div>
            </div>


            {{-- Summary --}}
            <div class="px-6 bg-white dark:bg-stone-600 dark:text-white pt-2 pb-2">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 ">

                    <div class="px-1">
                        <label for="year" class="block font-medium text-sm text-gray-700 dark:text-white">Total Volume</label>
                        <div class="px-2">{{ $totalVol }}</div>
                    </div>    

                    <div class="px-1">
                        <label for="Regions" class="block font-medium text-sm text-gray-700 dark:text-white">Total Amount</label>
                        <div class="px-2">{{ $totalAmount }}</div>
                    </div>    

                    {{-- <div class="px-1">
                        <label for="districts" class="block font-medium text-sm text-gray-700">District</label>
                        
                    </div>                         --}}
                </div>
            </div>


            {{-- Report --}}
            <div class="px-4 bg-white dark:bg-stone-600 dark:text-gray-200 sm:p-6">
                <div >
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 " id="products_table">
                        <thead>
                        <tr class="break-words text-left">
                            <th class="font-light">TDP</th>
                            <th class="font-light">Region</th>
                            <th class="font-light">District</th>
                            <th class="font-light">Land Type</th>
                            <th class="font-light">Method</th>
                            <th class="font-light">Market</th>
                            <th class="font-light text-right">Vol.</th>
                            <th class="font-light text-right">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($permits as $index => $permit)
                                <tr class="break-words">
                                    {{-- <td>
                                        <input type="text" 
                                            name="permits[{{ $index }}][log_no]" 
                                            size="10"
                                            wire:model="permits.{{ $index }}.log_no" />
                                    </td> --}}
                                    <td>
                                        {{ 'TDP'.str_pad($permit->id, 6, '0', STR_PAD_LEFT) }}
                                        {{-- {{ $permit->id }}  --}}
                                    </td>

                                    <td>
                                        {{ $permit->district->region->name }} 
                                    </td>

                                    <td>
                                        {{ $permit->district->name }} 
                                    </td>

                                    <td>
                                        {{ $permit->landtype->name }} 
                                    </td>

                                    <td>
                                        {{ $permit->logging_method }} 
                                    </td>

                                    <td>
                                        {{ $permit->market }} 
                                    </td>
                                    <td class='text-right'>
                                        {{ number_format($permit->billed_vol) }} 
                                        {{ number_format($permit->permitDetails->sum('vol'), 2) }} 

                                    </td>
                                    <td class='text-right'>
                                        {{ number_format($permit->billed_amount) }} 
                                    </td>


                                </tr>
                                
                            @endforeach

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
