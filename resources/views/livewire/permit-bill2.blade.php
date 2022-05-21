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
                        <label for="license_no" class="block font-medium text-sm text-gray-700 dark:text-gray-300">License No./Coupe No.</label>
                        {{-- <input type="text" name="license_no" id="license_no" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('license_no', $permit->license_no) }}" /> --}}
                            <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->license_no }}</span>
                        </div>



                    <div class="px-2 pb-4">
                        <label for="districts" class="block font-medium text-sm text-gray-700 dark:text-gray-300">District</label>
                        {{-- <select name="district_id" id="district_id" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                            @foreach($districts as $id => $district)
                                <option value="{{ $id }}" {{ (isset($permit) && $permit->district ? $permit->district->id : old('district_id')) == $id ? 'selected' : '' }}>
                                    {{ $district }}
                                </option>
                        @endforeach
                        </select> --}}
                            
                        {{-- <label for="districts" class="block align-middle text-xl text-sm text-gray-700 dark:text-gray-300">{{ $permit->district->name }}</label> --}}
                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->district->name }}</span>

                        @if($errors->has('district_id'))
                            <p class="help-block">
                                {{ $errors->first('district_id') }}
                            </p>
                        @endif
                    </div>    

                    <div class="px-2 pb-4">
                        <label for="landtypes" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Land Type</label>
                        {{-- <select name="land_type_id" id="land_type_id" disabled class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                          @foreach($landtypes as $id => $landtype)
                              <option value="{{ $id }}" {{ (isset($permit) && $permit->landtype ? $permit->landtype->id : old('land_type_id')) == $id ? 'selected' : '' }}>
                                  {{ $landtype }}
                              </option>
                          @endforeach
                          </select>
                          @if($errors->has('land_type_id'))
                              <p class="help-block">
                                  {{ $errors->first('land_type_id') }}
                              </p>
                          @endif --}}
                        
                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->landtype->name }}</span>

                    </div>    

                    {{-- <div class="px-1">
                        <label for="districts" class="block font-medium text-sm text-gray-700 dark:text-gray-300">District</label>
                        <input type="text" name="district_id" id="district_id" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ $permit->district->name }}" />                        
                    </div>    

                    <div class="px-1">
                        <label for="landtypes" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Land Type</label>
                        <input type="text" name="land_type_id" id="land_type_id" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ $permit->landtype->name }}" />                        
                    </div>     --}}


                    <div class="px-2 pb-4">
                        <label for="logging_method" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Logging method</label>
                        {{-- <input type="text" name="logging_method" id="logging_method" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ $permit->logging_method }}" />      --}}
                            
                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->logging_method }}</span>
                        
                        {{-- <select name="logging_method" id="logging_method" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                <option {{ ($permit->method) == 'Non-RIL' ? 'selected' : '' }} value="Non-RIL">
                                    Non-RIL
                                </option>
                                <option {{ ($permit->method) == 'RIL' ? 'selected' : '' }} value="RIL">
                                    RIL
                                </option>
                                <option {{ ($permit->method) == 'Helicopter' ? 'selected' : '' }} value="Helicopter">
                                    Helicopter
                                </option>
                        </select>
                        @if($errors->has('logging_method'))
                            <p class="help-block">
                                {{ $errors->first('logging_method') }}
                            </p>
                        @endif --}}
                    </div>    

                    <div class="px-2 pb-4">
                        <label for="market" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Market</label>
                        {{-- <input type="text" name="market" id="market" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ $permit->market }}" />        --}}

                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->market }}</span>

                        {{-- <select name="market" id="market" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                           <option {{ ($permit->market) == 'Export' ? 'selected' : '' }} value="Export">
                                Export
                            </option>
                            <option {{ ($permit->market) == 'Local Processing' ? 'selected' : '' }} value="Local Processing">
                                Local Processing
                            </option>
                        </select>
                        @if($errors->has('market'))
                            <p class="help-block">
                                {{ $errors->first('market') }}
                            </p>
                        @endif --}}
                    </div>    

                    <div class="px-2 pb-4">
                        <label for="licensee_ac_no" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Licensee A/C No.</label>
                        {{-- <input type="text" name="licensee_ac_no" id="licensee_ac_no" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('licensee_ac_no', $permit->licensee_ac_no) }}" />
                        @error('licensee_ac_no')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}
                        <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->licensee_ac_no }}</span>

                    </div>

                    <div class="px-2 pb-4">
                      <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Description</label>
                      {{-- <input type="text" name="description" id="description" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                          value="{{ old('description', $permit->description) }}" />
                      @error('description')
                          <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror --}}

                      <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->description }}</span>

                  </div>


                {{-- </div>
            </div>

            <div class="px-6 bg-white py-2">
                <div class="flex flex-row"> --}}

                    <div class="px-2 pb-4">
                        <label for="place_of_scaling" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Place of Scaling</label>
                        {{-- <input type="text" name="place_of_scaling" id="place_of_scaling" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('place_of_scaling', $permit->place_of_scaling) }}" />
                        @error('place_of_scaling')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}
                      <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->place_of_scaling }}</span>

                    </div>    

                    <div class="px-2 pb-4">
                      <label for="place_of_scaling" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Scaled Date</label>
                      {{-- <input type="date" name="scaled_date" id="scaled_date" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                          value="{{ old('scaled_date', $permit->scaled_date) }}" />
                      @error('scaled_date')
                          <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror --}}
                      <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->scaled_date }}</span>

                    </div>    

                    <div class="px-2 pb-4">
                        <label for="name_of_scaler" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Name of Scaler</label>
                        {{-- <input type="text" name="name_of_scaler" id="name_of_scaler" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('name_of_scaler', $permit->name_of_scaler) }}" />
                        @error('name_of_scaler')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}

                      <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->name_of_scaler }}</span>

                    </div>    

                    <div class="px-2 pb-4">
                        <label for="owner_of_property_hammer_mark" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Owner of Property Hammer Mark</label>
                        {{-- <input type="text" name="owner_of_property_hammer_mark" id="owner_of_property_hammer_mark" readonly type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('owner_of_property_hammer_mark', $permit->owner_of_property_hammer_mark) }}" />
                        @error('owner_of_property_hammer_mark')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror --}}

                      <span class="pr-4 block py-1 text-lg text-sm text-gray-700 dark:text-gray-300 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->owner_of_property_hammer_mark }}</span>

                    </div>    

                    <div class="px-2 pb-4">
                      <label for="registered_property_hammer_mark" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Owner of Property Hammer Mark</label>
                      {{-- <input type="text" name="registered_property_hammer_mark" id="registered_property_hammer_mark" readonly type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                          value="{{ old('registered_property_hammer_mark', $permit->registered_property_hammer_mark) }}" />
                      @error('registered_property_hammer_mark')
                          <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror --}}

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
                                        {{-- <input type="text" readonly
                                            name="permitdetails[{{ $index }}][log_no]" 
                                            size="15"
                                            wire:model="permitdetails.{{ $index }}.log_no" /> --}}
                                            <span class="px-2 block py-1 text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['log_no'] }}</span>

                                            {{-- <div>
                                            {{ $permitdetails[$index]['log_no'] }}
                                            </div> --}}
                                            {{-- {{ dd($permitdetail) }} --}}
                                            {{-- {{ $permitdetail[1] }} --}}
                                    </td>
                                    {{-- <td>
                                        <input type="text" readonly
                                            name="permitdetails[{{ $index }}][species_id]" 
                                            size="15"
                                            wire:model="permitdetails.{{ $index }}.species_id" 
                                            value="testing"/>
                                    </td> --}}
                                    <td>
                                        {{-- <select name="permitdetails[{{ $index }}][species_id]"
                                        wire:model="permitdetails.{{ $index }}.species_id"
                                        class="w-full" >
                                            @foreach ($species as $specie)
                                                <option value={{ $specie->id }}>
                                                    {{ $specie->name }}
                                                </option>
                                            @endforeach
                                        </select> --}}
    
                                        @foreach ($species as $specie)
                                            @if ($specie->id == $permitdetails[$index]['species_id'])
                                                
                                                <span class="px-2 block py-1 text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $specie->name }}</span>

                                                @break
                                            @endif
                                        @endforeach

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 5em" class="text-right"
                                            name="permitdetails[{{ $index }}][length]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.length" /> --}}
                                            
                                            <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['length'] }}</span>


                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 5em" class="text-right"
                                            name="permitdetails[{{ $index }}][diameter_1]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.diameter_1" /> --}}
                                            <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['diameter_1'] }}</span>

                                            

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 5em" class="text-right"
                                            name="permitdetails[{{ $index }}][diameter_2]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.diameter_2" /> --}}
                                            <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['diameter_2'] }}</span>

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 5em" class="text-right"
                                            name="permitdetails[{{ $index }}][mean]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.mean" /> --}}
                                            <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['mean'] }}</span>
                                            

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 5em" class="text-right"
                                            name="permitdetails[{{ $index }}][defect_symbol]"
                                            size="12" 
                                            wire:model="permitdetails.{{ $index }}.defect_symbol" /> --}}
                                            <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['defect_symbol'] }}</span>
                                            

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 5em" class="text-right"
                                            name="permitdetails[{{ $index }}][defect_length]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.defect_length" /> --}}
                                            <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['defect_length'] }}</span>
                                            

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 5em" class="text-right"
                                            name="permitdetails[{{ $index }}][defect_diameter]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.defect_diameter" /> --}}
                                            <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['defect_diameter'] }}</span>
                                            

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 6em" class="text-right"
                                            name="permitdetails[{{ $index }}][vol]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.vol" /> --}}
                                            <span class=" block text-right text-base text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['vol'] }}</span>
                                            

                                    </td>

                                    <td align="right">
                                        <input type="number" style="width: 5em" class="text-right dark:text-gray-900" wire:keydown.enter="calculateDetail({{ $index }})" wire:change="calculateDetail({{ $index }})" wire:click.prevent="calculateDetail({{ $index }})"
                                        {{-- <input type="number" style="width: 5em" class="text-right" wire:click.prevent="calculateDetail({{ $index }})" --}}
                                            name="permitdetails[{{ $index }}][royalty]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.royalty" />
                                    </td>
                                    <td align="right">
                                        <input type="number" style="width: 5em" class="text-right dark:text-gray-900" wire:keydown.enter="calculateDetail({{ $index }})" wire:change="calculateDetail({{ $index }})" wire:click.prevent="calculateDetail({{ $index }})"
                                        {{-- <input type="number" style="width: 5em" class="text-right" wire:click.prevent="calculateDetail({{ $index }})" --}}
                                            name="permitdetails[{{ $index }}][premium]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.premium" />
                                    </td>

                                    <td>
                                        {{-- <input type="number" readonly style="width: 6em" class="text-right"
                                            name="permitdetails[{{ $index }}][amount]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.amount" /> --}}
                                            <span class=" block text-right text-base font-bold text-sm text-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permitdetails[$index]['amount'] }}</span>

                                    </td>
                                    <td class="px-2">
                                        <button class="hidden btn btn-sm btn-secondary py-1" wire:click.prevent="calculateDetail({{ $index }})">
                                        {{-- <button class=" btn btn-sm btn-secondary py-1" wire:click="calculateDetail({{ $index }})"> --}}
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
                    </div>

                    <div class="flex px-6 justify-end text-xl dark:text-gray-200"> 
                        Total: {{ number_format($grandTotal) }}
                    </div>

                </div>
            </div>


            <div class="flex space-x-4 items-center justify-end px-4 py-3 bg-gray-50 dark:bg-stone-600 text-right sm:px-6">
                <div class="px-1">
                    <a href="{{ route('permits.show', $permit->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Cancel</a>
                </div> 
                {{-- <button class="hidden btn btn-sm btn-secondary py-1" wire:click.prevent="calculateDetail({{ $index }})"> --}}
                {{-- <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"> --}}
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" wire:click.prevent="updatebill()">
                    Bill
                </button>
            </div>
        </div>
    </form>
</div>

