<div>
    <form method="post" action="{{ route('permits.store') }}">
        @csrf
        
        <div class="shadow overflow-hidden sm:rounded-md">
            {{-- Company Info section 1 --}}
            {{-- {{ Auth::user()->name }}
            {{ Auth::user()->company->name }}
            {{ Auth::user()->company->license_no }}
            {{ Auth::user()->company->licensee_ac_no }} --}}

            
            {{-- master section 1 --}}
            <div class="px-6 bg-white dark:bg-stone-800 pt-4 pb-4">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6">

                    <div class="px-1 py-1">
                        <label for="license_no" class=" dark:text-gray-300 block font-medium text-sm text-gray-700">License No./Coupe No.</label>
                        <input type="text" name="license_no" id="license_no" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            {{-- value="{{ old('license_no', '') }}" /> --}}
                            value="{{ Auth::user()->company->license_no }}" />

                            {{-- value="{{ old('{{ Auth::user()->company->license_no }}', '') }}" /> --}}

                        @error('license_no')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="px-1 py-1">
                        <label for="districts" class=" dark:text-gray-300 block font-medium text-sm text-gray-700">District</label>
                        <select name="district_id" id="district" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                            @foreach($districts as $id => $district)
                                <option value="{{ $id }}" {{ (isset($tdp) && $tdp->district ? $tdp->district->id : old('district_id')) == $id ? 'selected' : '' }}>
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

                    <div class="px-1  py-1">
                        <label for="landtypes" class=" dark:text-gray-300 block font-medium text-sm text-gray-700">Land Type</label>
                        <select name="land_type_id" id="land_type_id" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
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

                    <div class="px-1  py-1">
                        <label for="logging_method" class=" dark:text-gray-300 block font-medium text-sm text-gray-700">Logging method</label>
                        <select name="logging_method" id="logging_method" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                <option value="" selected>
                                  Please select
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

                    <div class="px-1  py-1">
                        <label for="market" class=" dark:text-gray-300 block font-medium text-sm text-gray-700">Market</label>
                        <select name="market" id="market" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                           <option value="" selected>
                             Please select
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
                    
                    <div class="px-1  py-1">
                        <label for="licensee_ac_no" class=" dark:text-gray-300 block font-medium text-sm text-gray-700">Licensee A/C No.</label>
                        <input type="text" name="licensee_ac_no" id="licensee_ac_no" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                        {{-- value="{{ old('licensee_ac_no', '') }}" /> --}}
                        value="{{ Auth::user()->company->licensee_ac_no }}" />
                        
                        @error('licensee_ac_no')
                        <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="px-1 py-1">
                        <label for="description" class="dark:text-gray-300 block font-medium text-sm text-gray-700">Description</label>
                        {{-- <input type="text" name="description" id="description" type="text" class="rounded-md shadow-sm mt-1 block w-full" --}}
                        <input type="text" name="description" id="description" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"

                            value="{{ old('description') }}" />
                        @error('description')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="px-1  py-1">
                        <label for="place_of_scaling" class=" dark:text-gray-300 block font-medium text-sm text-gray-700">Place of Scaling</label>
                        <input type="text" name="place_of_scaling" id="place_of_scaling" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('place_of_scaling', '') }}" />
                        @error('place_of_scaling')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>    

                    <div class="px-1  py-1">
                      <label for="scaled_date" class=" dark:text-gray-300 block font-medium text-sm text-gray-700">Scaled Date</label>
                      <input type="date" name="scaled_date" id="scaled_date" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                        
                          value="{{ old('scaled_date', '') }}" />
                      @error('scaled_date')
                          <p class="text-sm text-red-600">{{ $message }}</p>
                      @enderror
                    </div>    

                    <div class="px-1  py-1">
                        <label for="name_of_scaler" class=" dark:text-gray-300 block font-medium text-sm text-gray-700">Name of Scaler</label>
                        <input type="text" name="name_of_scaler" id="name_of_scaler" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('name_of_scaler', '') }}" />
                        @error('name_of_scaler')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>    

                    <div class="px-1  py-1">
                        <label for="owner_of_property_hammer_mark" class=" dark:text-gray-300 block font-medium text-sm text-gray-700">Hammer Mark Owner</label>
                        <input type="text" name="owner_of_property_hammer_mark" id="owner_of_property_hammer_mark" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('owner_of_property_hammer_mark', '') }}" />
                        @error('owner_of_property_hammer_mark')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>    

                    <div class="px-1  py-1">
                      <label for="registered_property_hammer_mark" class=" dark:text-gray-300 block font-medium text-sm text-gray-700">Hammer Mark</label>
                      <input type="text" name="registered_property_hammer_mark" id="registered_property_hammer_mark" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                          value="{{ old('registered_property_hammer_mark', '') }}" />
                      @error('registered_property_hammer_mark')
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
                                            {{-- class="form-input" --}}
                                            wire:model="permitdetails.{{ $index }}.log_no" />
                                    </td>
                                    <td class="w-full form-control">
                                        <select name="permitdetails[{{ $index }}][species_id]" class=" min-w-full"
                                        wire:model="permitdetails.{{ $index }}.species_id"
                                        class="w-full" >
                                            <option value="">Select Species</option>
                                            @foreach ($species as $specie)
                                                <option value={{ $specie->id }}>
                                                    {{ $specie->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][length]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.length" />
                                    </td>
                                    <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][diameter_1]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.diameter_1" />
                                    </td>
                                    <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][diameter_2]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.diameter_2" />
                                    </td>
                                    <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][defect_symbol]"
                                            size="12" 
                                            wire:model="permitdetails.{{ $index }}.defect_symbol" />
                                    </td>
                                    <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][defect_length]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.defect_length" />
                                    </td>
                                    <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][defect_diameter]"
                                            size="4" 
                                            wire:model="permitdetails.{{ $index }}.defect_diameter" />
                                    </td>
                                    <td class="px-2">
                                      <button class="btn btn-sm btn-secondary py-1 dark:text-white" wire:click.prevent="removeDetail({{ $index }})">
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


                    <div class="row ">
                        <div class="col-md-12">
                            <button class="btn btn-sm btn-secondary py-2 " wire:click.prevent="addDetail">
                              + Add Another Log
                            </button>

                        </div>
                        <div>
                            Note: SN=Serial No., L=Length, D1=Diameter 1, D2=Diameter 2, DS=Defect Symbol, DL=Defect Length, DD=Defect Diameter
                        </div>
                    </div>
                </div>





            </div>


            <div class="flex space-x-4 items-center justify-end px-4 py-3 bg-gray-50  dark:bg-stone-600 text-right sm:px-6">
                {{-- <div class="px-1">
                    <a href="{{url()->previous()}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Cancel</a>
                </div> --}}
                <a href="{{ route('permits.index') }}"  class="pr-4">
                    <img src="{{ asset('back-arrow-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25">
                </a>

                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Save
                </button>

            </div>
        </div>
    </form>
</div>
