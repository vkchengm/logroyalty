<div>
    <form method="post" action="{{ route('permits.updatebill', $permit->id) }}">
        @csrf
        @method('PUT')                    
        <div class="shadow overflow-hidden sm:rounded-md">
            
            {{-- master section 1 --}}
            <div class="px-6 bg-white dark:bg-stone-800 pt-6 pb-4">
                <div class="flex flex-row">
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6">

                    <div class="px-2 pb-4 pb-4">
                        <label for="license_no" class="block font-medium text-sm text-gray-700 dark:text-gray-300">License No.</label>
                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->license->name }}</span>
                    </div>

                    <div class="px-2 pb-4">
                        <label for="license_no" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Coupe No.</label>
                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->licenseAccount->coupe_no }}</span>
                    </div>

                    <div class="px-2 pb-4">
                        <label for="license_no" class="block font-medium text-sm text-gray-700 dark:text-gray-300">License A/C No.</label>
                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->licenseAccount->account_no }}</span>
                    </div>

                    <div class="px-2 pb-4">
                        <label for="districts" class="block font-medium text-sm text-gray-700 dark:text-gray-300">District</label>
                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->district->name }}</span>

                        @if($errors->has('district_id'))
                            <p class="help-block">
                                {{ $errors->first('district_id') }}
                            </p>
                        @endif
                    </div>    

                    <div class="px-2 pb-4">
                        <label for="landtypes" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Land Type</label>
                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->landtype->name }}</span>
                    </div>    

                    <div class="px-2 pb-4">
                        <label for="logging_method" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Logging method</label>
                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->logging_method }}</span>
                    </div>    

                    <div class="px-2 pb-4">
                        <label for="market" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Market</label>
                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->market }}</span>
                    </div>    

                    <div class="px-2 pb-4">
                      <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Description</label>
                      <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->description }}</span>
                    </div>

                    <div class="px-2 pb-4">
                        <label for="place_of_scaling" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Place of Scaling</label>
                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->place_of_scaling }}</span>
                    </div>    

                    <div class="px-2 pb-4">
                      <label for="place_of_scaling" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Scaled Date</label>
                      <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->scaled_date }}</span>
                    </div>    

                    <div class="px-2 pb-4">
                        <label for="name_of_scaler" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Name of Scaler</label>
                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->name_of_scaler }}</span>
                    </div>    

                    <div class="px-2 pb-4">
                        <label for="owner_of_property_hammer_mark" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Owner of Property Hammer Mark</label>
                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->owner_of_property_hammer_mark }}</span>
                    </div>    

                    <div class="px-2 pb-4">
                      <label for="registered_property_hammer_mark" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Owner of Property Hammer Mark</label>
                      <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->registered_property_hammer_mark }}</span>
                    </div>   
                </div> 
              </div>
            </div>

            {{-- details --}}
            <div class="px-4 bg-white dark:bg-stone-600 sm:p-6">
                <div >
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:text-gray-300" id="products_table">
                        <thead>
                        <tr class="break-words text-left">
                            <th class="font-light">Log No.</th>
                            <th class="font-light">Species</th>
                            <th class="font-light text-right">L/M</th>
                            <th class="font-light text-right">D1/CM</th>
                            <th class="font-light text-right">D2/CM</th>
                            <th class="font-light text-right">Mean/CM</th>
                            <th class="font-light text-right">DS</th>
                            <th class="font-light text-right">DL/M</th>
                            <th class="font-light text-right">DD/CM</th>
                            <th class="font-light text-right">Vol/M</th>
                            <th class="font-bold text-right">Royalty</th>
                            <th class="font-bold text-right">Premium</th>
                            <th class="font-light text-right">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($permitdetails as $index => $permitdetail)
                                <tr class="break-words ">
                                    <td>
                                        <span class="px-2 block py-1 text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['log_no'] }}</span>
                                    </td>
                                    <td>
                                        @foreach ($species as $specie)
                                            @if ($specie->id == $permitdetails[$index]['species_id'])
                                                
                                                {{-- <span class="px-2 block py-1 text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $specie->name.' ('.$specie->type.')' }}</span> --}}
                                                <span class="px-2 block py-1 text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $specie->name }}</span>

                                                @break
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['length'] }}</span>
                                    </td>
                                    <td>
                                        <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['diameter_1'] }}</span>
                                    </td>
                                    <td>
                                        <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['diameter_2'] }}</span>
                                    </td>
                                    <td>
                                        <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['mean'] }}</span>
                                    </td>
                                    <td>
                                        <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['defect_symbol'] }}</span>
                                    </td>
                                    <td>
                                        <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['defect_length'] }}</span>
                                    </td>
                                    <td>
                                        <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['defect_diameter'] }}</span>
                                    </td>
                                    <td>
                                        <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['vol'] }}</span>
                                    </td>

                                    <td align="right">
                                        <input type="number" style="width: 5em" class="text-right dark:text-gray-900" wire:keydown.enter="calculateDetail({{ $index }})" wire:change="calculateDetail({{ $index }})" wire:click.prevent="calculateDetail({{ $index }})"
                                            name="permitdetails[{{ $index }}][royalty]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.royalty" />
                                    </td>
                                    <td align="right">
                                        <input type="number" style="width: 5em" class="text-right dark:text-gray-900" wire:keydown.enter="calculateDetail({{ $index }})" wire:change="calculateDetail({{ $index }})" wire:click.prevent="calculateDetail({{ $index }})"
                                            name="permitdetails[{{ $index }}][premium]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.premium" />
                                    </td>

                                    <td>
                                        <span class=" block text-right text-base font-bold text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ number_format($permitdetails[$index]['amount'],2) }}</span>

                                    </td>
                                    <td class="px-2">
                                        <button class="hidden btn btn-sm btn-secondary py-1" wire:click.prevent="calculateDetail({{ $index }})">
                                            Calculate
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    </div>
                    </div>

                    </div>

                    <div class="row dark:text-gray-300">
                        <div class='py-4 px-4'>
                            Note: SN=Serial No., L=Length, D1=Diameter 1, D2=Diameter 2, DS=Defect Symbol, DL=Defect Length, DD=Defect Diameter
                        </div>
                        {{-- <div class='px-4'>
                            Additional Charges
                        </div> --}}
                        <button class="btn btn-sm btn-secondary px-4 " wire:click.prevent="addCharges">
                            + Addition Charges
                        </button>
                    </div>

                    <table>
                    @if(!empty($additionalcharges))
                    @foreach ($additionalcharges as $index => $additionalcharge)
                        <tr>
                            <td>
                            <select name="additionalcharges[{{ $index }}][name]" class=" min-w-full"
                            wire:model="additionalcharges.{{ $index }}.name"
                            class="w-full" >
                                <option value="">Select Charge</option>
                                <option value="PPM">
                                    PPM
                                </option>
                                <option value="FCF">
                                    FCF
                                </option>
                                <option value="FRF">
                                    FRF
                                </option>
                                <option value="License Fee">
                                    License Fee
                                </option>
                                <option value="Other">
                                    Other
                                </option>
                            </select>
                            </td>
                            <td>
                            <select name="additionalcharges[{{ $index }}][unit]" class=" min-w-full" wire:change="calculateDetail({{ $index }})" wire:click.prevent="calculateDetail({{ $index }})"
                            wire:model="additionalcharges.{{ $index }}.unit"
                            class="w-full" >
                                <option value="">Select Unit</option>
                                <option value="Per M3">
                                    Per M3
                                </option>
                                <option value="Per Permit">
                                    Per Permit
                                </option>
                            </select>
                            </td>
                            <td>
                            <input type="text" placeholder="Description"
                                name="additionalcharges[{{ $index }}][description]" 
                                size="10"
                                wire:model="additionalcharges.{{ $index }}.description" />
                            </td>
                            <td>
                            <input type="number" placeholder="Amount" wire:keydown.enter="calculateDetail({{ $index }})" wire:change="calculateDetail({{ $index }})" wire:click.prevent="calculateDetail({{ $index }})"
                                name="additionalcharges[{{ $index }}][amount]" 
                                size="10"
                                wire:model="additionalcharges.{{ $index }}.amount" />
                            </td>
                            <td>
                                <span class="px-4 block text-right text-base font-bold text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ number_format($additionalcharges[$index]['total'],2) }}</span>
                            </td>
                            <td>
                            <button class="btn btn-sm btn-secondary py-1 dark:text-white" wire:click.prevent="removeDetail({{ $index }})">
                                Delete
                            </button>
                            </td>
                        </div>
                    @endforeach
                    @endif
                    </table>

                    <div class="flex px-6 justify-end text-xl dark:text-gray-200"> 
                        Volume: {{ number_format($grandVol, 2) }}
                    </div>
                    <div class="flex px-6 justify-end text-xl dark:text-gray-200"> 
                        Total: {{ number_format($grandTotal, 2) }}
                    </div>

                </div>
            </div>

            <div class="flex space-x-4 items-center justify-end px-4 py-3 bg-gray-50 dark:bg-stone-600 text-right sm:px-6">
                <div class="px-1">
                    <a href="{{ route('permits.show', $permit->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Cancel</a>
                </div> 
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:click.prevent="updatebill()">
                    Bill
                </button>
            </div>
        </div>
    </form>
</div>

