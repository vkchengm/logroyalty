<div>
    <form method="post" action="{{ route('permits.update', $permit->id) }}">
        @csrf
        @method('PUT')                    
        <div class="shadow overflow-hidden sm:rounded-md">
            
            {{-- master section 1 --}}
            <div class="px-6 bg-white dark:bg-stone-800 pt-4 pb-4">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7">

                    <div class="px-1 py-1">
                        <label for="license_no" class="dark:text-gray-300 block font-medium text-sm text-gray-700">License No.</label>
                        {{-- <select name="license_no" id="license_no" class="form-control select2 rounded-md shadow-sm mt-1 block w-full" wire:change="changeLicense()" > --}}
                        <select name="license_no" id="license_no" class="form-control select2 rounded-md shadow-sm mt-1 block w-full" wire:change="changeLicense()" wire:model="licenseId" >
                        {{-- <select name="license_no" id="license_no" class="form-control select2 rounded-md shadow-sm mt-1 block w-full" > --}}
                                @foreach($licenses as $id => $license )
                                <option value="{{ $id }}" {{ (isset($permit) && $permit ? $permit->license_no : old('license_no')) == $id ? 'selected' : '' }}>
                                    {{ $license }}
                                </option>
                        @endforeach
                        </select>
                        @if($errors->has('license_no'))
                            <p class="help-block">
                                {{ $errors->first('license_no') }}
                            </p>
                        @endif
                    </div>    

                    <div class="px-1 py-1">
                        <label for="coupe_no" class="dark:text-gray-300 block font-medium text-sm text-gray-700">Coupe No.</label>
                        <select name="coupe_no" id="coupe_no" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                            @foreach($licenseCoupes as $id => $licenseCoupe )
                                <option value="{{ $id }}" {{ (isset($permit) && $permit ? $permit->coupe_no : old('coupe_no')) == $id ? 'selected' : '' }}>
                                    {{ $licenseCoupe }}
                                </option>
                        @endforeach
                        </select>
                        @if($errors->has('coupe_no'))
                            <p class="help-block">
                                {{ $errors->first('coupe_no') }}
                            </p>
                        @endif
                    </div>    

                    <div class="px-1 py-1">
                        <label for="licensee_ac_no" class="dark:text-gray-300 block font-medium text-sm text-gray-700">License A/C No.</label>
                        <select name="licensee_ac_no" id="licensee_ac_no" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                            @foreach($licenseAccounts as $id => $licenseAccount )
                                <option value="{{ $id }}" {{ (isset($permit) && $permit ? $permit->licensee_ac_no : old('licensee_ac_no')) == $id ? 'selected' : '' }}>
                                    {{ $licenseAccount }}
                                </option>
                        @endforeach
                        </select>
                        @if($errors->has('licensee_ac_no'))
                            <p class="help-block">
                                {{ $errors->first('licensee_ac_no') }}
                            </p>
                        @endif
                    </div>    



                    {{-- <div class="px-1 py-1">
                        <label for="coupe_no" class="pb-1 dark:text-gray-300 block font-medium text-sm text-gray-700">Coupe No.</label>
                        <div class="px-2 py-2 border border-gray-500 rounded-md dark:bg-white">
                            {{ $permit->licenseCoupe->coupe_no }}
                        </div>
                    </div> --}}

                    {{-- <div class="px-1 py-1">
                        <label for="coupe_no" class="dark:text-gray-300 block font-medium text-sm text-gray-700">Coupe No.</label>
                        <input type="text" name="coupe_no" id="coupe_no" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('coupe_no', $permit->coupe_no) }}" />
                        @error('coupe_no')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    {{-- <div class="px-1 py-1">
                        <label for="licensee_ac_no" class="dark:text-gray-300 block font-medium text-sm text-gray-700">Licensee A/C No.</label>
                        <input type="text" name="licensee_ac_no" id="licensee_ac_no" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('licensee_ac_no', $permit->licensee_ac_no) }}" />
                        @error('licensee_ac_no')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    {{-- <div class="px-1 py-1">
                        <label for="license_no" class="dark:text-gray-300 block font-medium text-sm text-gray-700">License No.</label>
                        <input type="text" name="license_no" id="license_no" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('license_no', $permit->license_no) }}" />
                        @error('license_no')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div> --}}


                    <div class="px-1 py-1">
                        <label for="districts" class="dark:text-gray-300 block font-medium text-sm text-gray-700">District</label>
                        <select name="district_id" id="district" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
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

                    <div class="px-1 py-1">
                        <label for="landtypes" class="dark:text-gray-300 block font-medium text-sm text-gray-700">Land Type</label>
                        <select name="land_type_id" id="land_type_id" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
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


                    <div class="px-1 py-1">
                        <label for="logging_method" class="dark:text-gray-300 block font-medium text-sm text-gray-700">Logging method</label>
                        <select name="logging_method" id="logging_method" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                {{-- <option value="" selected>
                                  Please select
                                </option> --}}
                                <option {{ ($permit->logging_method) == 'Non-RIL' ? 'selected' : '' }} value="Non-RIL">
                                    Non-RIL
                                </option>
                                <option {{ ($permit->logging_method) == 'RIL' ? 'selected' : '' }} value="RIL">
                                    RIL
                                </option>
                                <option {{ ($permit->logging_method) == 'Helicopter' ? 'selected' : '' }} value="Helicopter">
                                    Helicopter
                                </option>
                        </select>
                        @if($errors->has('logging_method'))
                            <p class="help-block">
                                {{ $errors->first('logging_method') }}
                            </p>
                        @endif
                    </div>    

                    <div class="px-1 py-1">
                        <label for="market" class="dark:text-gray-300 block font-medium text-sm text-gray-700">Market</label>
                        <select name="market" id="market" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                           {{-- <option value="" selected>
                             Please select
                           </option> --}}
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
                        @endif
                    </div>    

                    <div class="px-1 py-1">
                        <label for="description" class="dark:text-gray-300 block font-medium text-sm text-gray-700">Description</label>
                        <input type="text" name="description" id="description" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('description', $permit->description) }}" />
                        @error('description')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="px-1 py-1">
                        <label for="place_of_scaling" class="dark:text-gray-300 block font-medium text-sm text-gray-700">Place of Scaling</label>
                        <input type="text" name="place_of_scaling" id="place_of_scaling" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('place_of_scaling', $permit->place_of_scaling) }}" />
                        @error('place_of_scaling')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>    

                    <div class="px-1 py-1">
                      <label for="scaled_date" class="dark:text-gray-300 block font-medium text-sm text-gray-700">Scaled Date</label>
                      <input type="date" name="scaled_date" id="scaled_date" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                          value="{{ old('scaled_date', $permit->scaled_date) }}" required/>
                      @error('scaled_date')
                          <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                    </div>    

                    <div class="px-1 py-1">
                        <label for="name_of_scaler" class="dark:text-gray-300 block font-medium text-sm text-gray-700">Name of Scaler</label>
                        <input type="text" name="name_of_scaler" id="name_of_scaler" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('name_of_scaler', $permit->name_of_scaler) }}" />
                        @error('name_of_scaler')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>    

                    <div class="px-1 py-1">
                        <label for="owner_of_property_hammer_mark" class="dark:text-gray-300 block font-medium text-sm text-gray-700">Hammer Mark Owner</label>
                        <input type="text" name="owner_of_property_hammer_mark" id="owner_of_property_hammer_mark" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('owner_of_property_hammer_mark', $permit->owner_of_property_hammer_mark) }}" />
                        @error('owner_of_property_hammer_mark')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>    

                    <div class="px-1 py-1">
                      <label for="registered_property_hammer_mark" class="dark:text-gray-300 block font-medium text-sm text-gray-700">Hammer Mark</label>
                      <input type="text" name="registered_property_hammer_mark" id="registered_property_hammer_mark" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                          value="{{ old('registered_property_hammer_mark', $permit->registered_property_hammer_mark) }}" />
                      @error('registered_property_hammer_mark')
                          <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                    </div>    

                    <div class="px-1 py-1">
                        <label for="buyer" class="dark:text-gray-300 block font-medium text-sm text-gray-700">Buyer</label>
                        <input type="text" name="buyer" id="buyer" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('buyer', $permit->buyer) }}" />
                        @error('buyer')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>    
  
              </div>
            </div>

            {{-- details --}}
            <div class="px-4 bg-white dark:bg-stone-600 dark:text-gray-300 sm:p-6">
                <div >
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200" id="products_table">
                        <thead>
                        <tr class="break-words">
                            <th class="font-light">Log No.</th>
                            <th class="font-light">Species</th>
                            <th class="font-light">L(M)</th>
                            <th class="font-light">D1(CM)</th>
                            <th class="font-light">D2(CM)</th>
                            <th class="font-light">DS</th>
                            <th class="font-light">DL(M)</th>
                            <th class="font-light">DD(CM)</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($permitdetails as $index => $permitdetail)
                                <tr class="break-words dark:text-gray-900">
                                    <td>
                                        <input type="text" 
                                            name="permitdetails[{{ $index }}][log_no]" 
                                            size="10"
                                            wire:model="permitdetails.{{ $index }}.log_no" required/>
                                    </td>
                                    <td class="w-full form-control ">
                                        <select name="permitdetails[{{ $index }}][species_id]" class=" min-w-full"
                                        wire:model="permitdetails.{{ $index }}.species_id"
                                        class="w-full" required>
                                            <option value="">Select Species</option>
                                            @foreach ($species as $specie)
                                                <option value={{ $specie->id }}>
                                                    {{ $specie->name.' ('.$specie->type.')' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" step=".2" style="width: 7em"
                                            name="permitdetails[{{ $index }}][length]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.length" min="0.2"/>
                                    </td>
                                    <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][diameter_1]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.diameter_1" min="1"/>
                                    </td>
                                    <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][diameter_2]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.diameter_2" min="1"/>
                                    </td>
                                    
                                    {{-- <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][defect_symbol]"
                                            size="12" 
                                            wire:model="permitdetails.{{ $index }}.defect_symbol" />
                                    </td> --}}
                                    <td class="w-full form-control ">
                                        <select name="permitdetails[{{ $index }}][defect_symbol]" class=" min-w-full"
                                        wire:model="permitdetails.{{ $index }}.defect_symbol"
                                        class="w-full" >
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </td>

                                    <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][defect_length]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.defect_length" min="0.2"/>
                                    </td>
                                    <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][defect_diameter]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.defect_diameter" min="1" />
                                    </td>
                                    <td class="px-2">
                                      {{-- <button class="btn btn-sm btn-secondary py-1 dark:text-white" wire:click.prevent="removeEditDetail({{ $index }})"> --}}
                                      <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" wire:click.prevent="removeEditDetail({{ $index }})">
                                        Delete
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
                        <div class="col-md-12 py-4">

                            <input type="number" wire:model="line_no" name="line_no" id="line_no" class="form-input rounded-md shadow-sm mt-1 w-16">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" wire:click.prevent="addDetails">
                                Add Logs
                            </button>
                    
                            {{-- <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" wire:click.prevent="addDetails">
                                Import Logs from Excel file
                            </button> --}}



                            {{-- <button class="btn btn-sm btn-secondary py-2" wire:click.prevent="addEditDetail">
                              + Add Another Log
                            </button> --}}

                           

                        </div>
                        <div>
                            Note: SN=Serial No., L=Length, D1=Diameter 1, D2=Diameter 2, DS=Defect Symbol, DL=Defect Length, DD=Defect Diameter
                        </div>
                    </div>
                </div>





            </div>


            <div class="flex space-x-4 items-center justify-end px-4 py-3 bg-gray-50 dark:bg-stone-600 text-right sm:px-6">
                {{-- <div class="px-1">
                    <a href="{{ route('permits.show', $permit->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Cancel</a>
                </div> --}}

                <a href="{{ route('permits.show', $permit->id) }}"  class="pr-4">
                    <img src="{{ asset('back-arrow-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25">
                </a>
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
