<div>
    <form method="post" action="{{ route('permits.updatebill', $permit->id) }}">
        @csrf
        @method('PUT')                    
        <div class="shadow overflow-hidden sm:rounded-md">
            
            {{-- master section 1 --}}
            <div class="px-6 bg-white pt-6 pb-4">
                <div class="flex flex-row">

                    {{-- <div class="px-1">
                        <label for="license_no" class="block font-medium text-sm text-gray-700">License No./Coupe No.</label>
                        <input type="text" name="license_no" id="license_no" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('license_no', $permit->license_no) }}" />
                            <p class="pr-4 block py-1 text-lg text-sm text-gray-700 rounded-md shadow-sm mt-1 border-solid w-full">{{ $permit->license_no }}</p>

                    </div> --}}



                    <div class="px-1">
                        <label for="districts" class="block font-medium text-sm text-gray-700">District</label>
                        <select name="district_id" id="district_id" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                            @foreach($districts as $id => $district)
                                <option value="{{ $id }}" {{ (isset($permit) && $permit->district ? $permit->district->id : old('district_id')) == $id ? 'selected' : '' }}>
                                    {{ $district }}
                                </option>
                        @endforeach
                        </select>
                        @if($errors->has('district_id'))
                            <p class="help-block">
                                {{ $errors->first('district_id') }}
                            </p>
                        @endif
                    </div>    

                    <div class="px-1">
                        <label for="landtypes" class="block font-medium text-sm text-gray-700">Land Type</label>
                        <select name="land_type_id" id="land_type_id" disabled class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
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
                          @endif
                    </div>    

                    {{-- <div class="px-1">
                        <label for="districts" class="block font-medium text-sm text-gray-700">District</label>
                        <input type="text" name="district_id" id="district_id" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ $permit->district->name }}" />                        
                    </div>    

                    <div class="px-1">
                        <label for="landtypes" class="block font-medium text-sm text-gray-700">Land Type</label>
                        <input type="text" name="land_type_id" id="land_type_id" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ $permit->landtype->name }}" />                        
                    </div>     --}}


                    <div class="px-1">
                        <label for="logging_method" class="block font-medium text-sm text-gray-700">Logging method</label>
                        <input type="text" name="logging_method" id="logging_method" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ $permit->logging_method }}" />                        
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

                    <div class="px-1">
                        <label for="market" class="block font-medium text-sm text-gray-700">Market</label>
                        <input type="text" name="market" id="market" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                        value="{{ $permit->market }}" />                        

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

                    <div class="px-1">
                        <label for="licensee_ac_no" class="block font-medium text-sm text-gray-700">Licensee A/C No.</label>
                        <input type="text" name="licensee_ac_no" id="licensee_ac_no" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('licensee_ac_no', $permit->licensee_ac_no) }}" />
                        @error('licensee_ac_no')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="px-1">
                      <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                      <input type="text" name="description" id="description" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                          value="{{ old('description', $permit->description) }}" />
                      @error('description')
                          <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>


                </div>
            </div>

            {{-- master section 2 --}}
            <div class="px-6 bg-white py-2">
                <div class="flex flex-row">
                    <div class="px-1">
                        <label for="place_of_scaling" class="block font-medium text-sm text-gray-700">Place of Scaling</label>
                        <input type="text" name="place_of_scaling" id="place_of_scaling" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('place_of_scaling', $permit->place_of_scaling) }}" />
                        @error('place_of_scaling')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>    

                    <div class="px-1">
                      <label for="place_of_scaling" class="block font-medium text-sm text-gray-700">Scaled Date</label>
                      <input type="date" name="scaled_date" id="scaled_date" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                          value="{{ old('scaled_date', $permit->scaled_date) }}" />
                      @error('scaled_date')
                          <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                    </div>    

                    <div class="px-1">
                        <label for="name_of_scaler" class="block font-medium text-sm text-gray-700">Name of Scaler</label>
                        <input type="text" name="name_of_scaler" id="name_of_scaler" type="text" readonly class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('name_of_scaler', $permit->name_of_scaler) }}" />
                        @error('name_of_scaler')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>    

                    <div class="px-1">
                        <label for="owner_of_property_hammer_mark" class="block font-medium text-sm text-gray-700">Owner of Property Hammer Mark</label>
                        <input type="text" name="owner_of_property_hammer_mark" id="owner_of_property_hammer_mark" readonly type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('owner_of_property_hammer_mark', $permit->owner_of_property_hammer_mark) }}" />
                        @error('owner_of_property_hammer_mark')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>    

                    <div class="px-1">
                      <label for="registered_property_hammer_mark" class="block font-medium text-sm text-gray-700">Owner of Property Hammer Mark</label>
                      <input type="text" name="registered_property_hammer_mark" id="registered_property_hammer_mark" readonly type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                          value="{{ old('registered_property_hammer_mark', $permit->registered_property_hammer_mark) }}" />
                      @error('registered_property_hammer_mark')
                          <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>    
              </div>
            </div>

            {{-- details --}}
            <div class="px-4 bg-white sm:p-6">
                <div >
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200" id="products_table">
                        <thead>
                        <tr class="break-words">
                            <th class="font-light">Log No.</th>
                            <th class="font-light">Species</th>
                            <th class="font-light">L/M</th>
                            <th class="font-light">D1/CM</th>
                            <th class="font-light">D2/CM</th>
                            <th class="font-light">Mean/CM</th>
                            <th class="font-light">DS</th>
                            <th class="font-light">DL/M</th>
                            <th class="font-light">DD/CM</th>
                            <th class="font-light">Vol/M</th>
                            <th class="font-bold">Rate</th>
                            <th class="font-light">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($permitdetails as $index => $permitdetail)
                                <tr class="break-words">
                                    <td>
                                        {{-- <input type="text" readonly
                                            name="permitdetails[{{ $index }}][log_no]" 
                                            size="15"
                                            wire:model="permitdetails.{{ $index }}.log_no" /> --}}
                                            <div>
                                            {{ $permitdetails[$index]['log_no'] }}
                                            </div>
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
                                    <td class="w-full form-control">
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
                                                {{ $specie->name }}
                                                @break
                                            @endif
                                        @endforeach

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 5em" class="text-right"
                                            name="permitdetails[{{ $index }}][length]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.length" /> --}}
                                            {{ $permitdetails[$index]['length'] }}

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 5em" class="text-right"
                                            name="permitdetails[{{ $index }}][diameter_1]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.diameter_1" /> --}}
                                            {{ $permitdetails[$index]['diameter_1'] }}

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 5em" class="text-right"
                                            name="permitdetails[{{ $index }}][diameter_2]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.diameter_2" /> --}}
                                            {{ $permitdetails[$index]['diameter_2'] }}

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 5em" class="text-right"
                                            name="permitdetails[{{ $index }}][mean]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.mean" /> --}}
                                            {{ $permitdetails[$index]['mean'] }}

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 5em" class="text-right"
                                            name="permitdetails[{{ $index }}][defect_symbol]"
                                            size="12" 
                                            wire:model="permitdetails.{{ $index }}.defect_symbol" /> --}}
                                            {{ $permitdetails[$index]['defect_symbol'] }}

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 5em" class="text-right"
                                            name="permitdetails[{{ $index }}][defect_length]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.defect_length" /> --}}
                                            {{ $permitdetails[$index]['defect_length'] }}

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 5em" class="text-right"
                                            name="permitdetails[{{ $index }}][defect_diameter]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.defect_diameter" /> --}}
                                            {{ $permitdetails[$index]['defect_diameter'] }}

                                    </td>
                                    <td>
                                        {{-- <input type="number" readonly style="width: 6em" class="text-right"
                                            name="permitdetails[{{ $index }}][vol]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.vol" /> --}}
                                            {{ $permitdetails[$index]['vol'] }}

                                    </td>
                                    <td>
                                        <input type="number" style="width: 5em" class="text-right" wire:keydown.enter="calculateDetail({{ $index }})"
                                            name="permitdetails[{{ $index }}][rate]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.rate" />
                                    </td>
                                    <td>
                                        <input type="number" readonly style="width: 6em" class="text-right"
                                            name="permitdetails[{{ $index }}][amount]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.amount" />
                                    </td>
                                    <td class="px-2">
                                        <button class="btn btn-sm btn-secondary py-1" wire:click.prevent="calculateDetail({{ $index }})">
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

                    <div class="row">
                        <div class='py-4 px-4'>
                            Note: SN=Serial No., L=Length, D1=Diameter 1, D2=Diameter 2, DS=Defect Symbol, DL=Defect Length, DD=Defect Diameter
                        </div>
                    </div>

                    <div class="flex px-6 justify-end text-xl"> 
                        Total: {{ number_format($grandTotal) }}
                    </div>

                </div>
            </div>


            <div class="flex space-x-4 items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                <div class="px-1">
                    <a href="{{ route('permits.show', $permit->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Cancel</a>
                </div> 
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Bill
                </button>
            </div>
        </div>
    </form>
</div>

