<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Permit Summary Report --}}
            R1: RIL, Non-RIL & Helicopter Report
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-2 sm:px-6 lg:px-8">
            <div class=" md:mt-0 md:col-span-2">
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
                
                                    <div class="px-1">
                                        <label for="month" class="block font-medium text-sm text-gray-700">Month @error('selectedMonth')<br>{{ $message }}@enderror</label>
                                        <select name="selectedMonth" id="selectedMonth" class="form-control select2 rounded-md shadow-sm mt-1 block w-full @error('selectedMonth') error @enderror" wire:change="changeOption()" wire:model="selectedMonth" >
                                            <option value="" selected>
                                                All
                                            </option>
                
                
                                            @foreach($monthList as $id => $month)
                                            <option value="{{ $month->month }}" {{ ( $id == $selectedMonth) ? 'selected' : '' }} >
                
                                            {{-- <option value="{{ $month->month }}" :key="lang{{ $loop->index }}" > --}}
                                                {{ $month->month }}
                                            </option>
                                            @endforeach
                                        </select>
                
                                    </div>    
                                    {{-- <button wire:click.prevent="changeOption()">
                                        Search
                                    </button>                     --}}
                                    
                                </div>
                            </div>
                
                
                            {{-- Summary --}}
                            <div class="px-6 bg-white pt-2 pb-2">
                                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 ">
                                    <div class="px-1">
                                        <label for="totalvolume" class="block font-medium text-sm text-gray-700">Total Volume</label>
                                        <div class="px-2">{{ $totalVol }}</div>
                                    </div>    

                                    <div class="px-1">
                                        <label for="totalamount" class="block font-medium text-sm text-gray-700">Total Amount</label>
                                        <div class="px-2">{{ $totalAmount }}</div>
                                    </div>    
                                </div>
                            </div>
                
                            {{-- Report --}}
                            <div class="px-4 bg-white sm:p-6">
                                <div >
                                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200" id="products_table">
                                        <thead>
                                        <tr class="break-words text-left">
                                            <th class="font-light">Year</th>
                                            <th class="font-light">Month</th>
                                            <th class="font-light">Helicopter</th>
                                            <th class="font-light">Non-RIL</th>
                                            <th class="font-light">RIL</th>
                                            <th class="font-light">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($permits as $index => $permit)
                                                <tr class="break-words">
                
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
                








            </div>
        </div>
    </div>
</x-app-layout>