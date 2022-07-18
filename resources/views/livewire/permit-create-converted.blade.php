<div>
    <form method="post" action="{{ route('permits.store') }}" enctype="multipart/form-data" onkeydown="return event.key != 'Enter';">
        @csrf

        <div class="shadow overflow-hidden sm:rounded-md">
            {{-- master section 1 --}}
            <div class="px-6 bg-white dark:bg-stone-800 pt-4 pb-4">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5">

                    <input type="hidden" name="timber_type" id="timber_type" value="converted"/>

                    <div class="form-group px-1 py-1">
                        <label for="license_no" class="form-control dark:text-gray-300 block font-medium text-sm text-gray-700">License No.</label>
                        <select name="license_no" id="license_no" class="form-control select2 rounded-md shadow-sm mt-1 block w-full" wire:change="changeLicense()" wire:model="licenseId" required>
                            <option value="">Please Select</option>
                            @foreach($licenses as $id => $license)
                                <option value="{{ $license }}">
                                    {{ $id }}
                                </option>
                        @endforeach
                        </select>
                        @if($errors->has('license_no'))
                            <p class="help-block">
                                {{ $errors->first('license_no') }}
                            </p>
                        @endif
                    </div>

                    <div class="form-group px-1 py-1">
                        <label for="licensee_ac_no" class="block font-medium text-sm text-gray-700 dark:text-white">License A/C No.</label>
                        <select name="licensee_ac_no" id="licensee_ac_no" class="form-control select2 rounded-md shadow-sm mt-1 block w-full" wire:model="licensee_ac_no" wire:change="updateCoupe()" required>
                        <option value="">Please Select</option>
                        @isset($licenseAccounts)
                            @foreach($licenseAccounts as $id => $licenseAccount)
                                    <option value="{{ $licenseAccount->id }}">
                                        {{ $licenseAccount->account_no }}
                                    </option>
                            @endforeach
                        @endisset
                        </select>
                    </div>

                    <div class="form-group px-1 py-1">
                        <label for="coupe_no" class="block font-medium text-sm text-gray-700 dark:text-white">Coupe No.</label>
                        <input type="text" name="coupe_no_tmp" id="coupe_no_tmp" class="form-input rounded-md shadow-sm mt-1 block w-full" wire:model="coupe_no" readonly />
                    </div>

                    <div class="form-group px-1 py-1">
                        <label for="districts" class="form-control dark:text-gray-300 block font-medium text-sm text-gray-700">District</label>
                        {{-- <select name="district_id" id="district" class="form-control select2 rounded-md shadow-sm mt-1 block w-full" wire:change="changeDistrict" wire:model="districtId" required> --}}
                        <select name="district_id" id="district" class="form-control select2 rounded-md shadow-sm mt-1 block w-full" required>
                            @foreach($districts as $id => $district)
                                <option value="{{ $district }}">
                                    {{ $id }}
                                </option>
                        @endforeach
                        </select>
                        @if($errors->has('district_id'))
                            <p class="help-block">
                                {{ $errors->first('district_id') }}
                            </p>
                        @endif
                    </div>

                    <div class="form-group px-1 py-1">
                        <label for="landtypes" class="form-control dark:text-gray-300 block font-medium text-sm text-gray-700">Land Type</label>
                        <select name="land_type_id" id="land_type_id" class="form-control select2 rounded-md shadow-sm mt-1 block w-full" required  >
                          @foreach($landtypes as $id => $landtype)
                              <option value="{{ $landtype }}" {{ (isset($tdp) && $tdp->landtype ? $tdp->landtype->id : old('land_type_id')) == $id ? 'selected' : '' }}>
                                  {{ $id }}
                              </option>
                          @endforeach
                          </select>
                          @if($errors->has('land_type_id'))
                              <p class="help-block">
                                  {{ $errors->first('land_type_id') }}
                              </p>
                          @endif
                    </div>

                    <div class="form-group px-1 py-1">
                        <label for="logging_method" class="form-control dark:text-gray-300 block font-medium text-sm text-gray-700">Logging method</label>
                        <select name="logging_method" id="logging_method" class="form-control select2 rounded-md shadow-sm mt-1 block w-full" required>
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

                    <div class="form-group px-1 py-1">
                        <label for="market" class="form-control dark:text-gray-300 block font-medium text-sm text-gray-700">Market</label>
                        <select name="market" id="market" class="form-control select2 rounded-md shadow-sm mt-1 block w-full" required>
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

                    <div class="form-group px-1 py-1">
                        <label for="description" class="form-control dark:text-gray-300 block font-medium text-sm text-gray-700">Description</label>
                        <input type="text" name="description" id="description" class="form-input rounded-md shadow-sm mt-1 block w-full" wire:model="description"

                            value="{{ old('description', '') }}" />
                        @error('description')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group px-1 py-1">
                        <label for="place_of_scaling" class="form-control dark:text-gray-300 block font-medium text-sm text-gray-700">Place of Scaling</label>
                        <input type="text" name="place_of_scaling" id="place_of_scaling" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('place_of_scaling', '') }}" />
                        @error('place_of_scaling')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group px-1 py-1">
                        <label for="buyer" class="form-control dark:text-gray-300 block font-medium text-sm text-gray-700">Buyer</label>
                        <input type="text" name="buyer" id="buyer" class="form-input rounded-md shadow-sm mt-1 block w-full"
                            value="{{ old('buyer', '') }}" />
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
                            <th class="font-light">W(CM)</th>
                            <th class="font-light">H(CM)</th>
                            <th class="font-light">DS</th>
                            <th class="font-light">DL(M)</th>
                            <th class="font-light">DA(CM)</th>
                            <th class="px-2 py-2">
                                <a href="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" wire:keydown.enter="removeDetails" wire:click.prevent="removeDetails()">Clear</a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($permitdetails as $index => $permitdetail)
                                <tr class="break-words dark:text-gray-900">
                                    <td>
                                        <input type="text"
                                            name="permitdetails[{{ $index }}][log_no]"
                                            size="10"
                                            class="form-control"
                                            wire:model="permitdetails.{{ $index }}.log_no" required/>
                                    </td>
                                    <td class="w-full form-control">
                                        <select name="permitdetails[{{ $index }}][species_id]" class=" min-w-full"
                                        wire:model="permitdetails.{{ $index }}.species_id"
                                        class="w-full" required>
                                            <option value="">Select Species</option>
                                            @foreach ($species as $specie)
                                                <option value={{ $specie->id }}>
                                                    {{ $specie->name }}
                                                    {{-- {{ $specie->name.' ('.$specie->type.')' }} --}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][length]"
                                            size="4"
                                            class="form-control"
                                            wire:model="permitdetails.{{ $index }}.length" min="0.2" step="0.2"/>
                                    </td>
                                    <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][diameter_1]"
                                            size="4"
                                            class="form-control"
                                            wire:model="permitdetails.{{ $index }}.diameter_1" min="1"/>
                                    </td>
                                    <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][diameter_2]"
                                            size="4"
                                            class="form-control"
                                            wire:model="permitdetails.{{ $index }}.diameter_2" min="1"/>
                                    </td>
                                    <td class="w-full form-control">
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
                                            class="form-control"
                                            wire:model="permitdetails.{{ $index }}.defect_length" min="0" step="0.2"/>
                                    </td>
                                    <td>
                                        <input type="number" style="width: 7em"
                                            name="permitdetails[{{ $index }}][defect_diameter]"
                                            size="4"
                                            class="form-control"
                                            wire:model="permitdetails.{{ $index }}.defect_diameter" min="0" step="1"/>
                                    </td>
                                    <td class="px-2">
                                        <a href="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" wire:keydown.enter="removeDetail({{$index}})" wire:click.prevent="removeDetail({{$index}})">Delete</a>

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

                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-40" wire:click.prevent="addDetails" wire:keydown.enter="addDetails">
                                Add Logs
                            </button>
                            <input type="number" wire:model="line_no" name="line_no" id="line_no" class="form-input rounded-md shadow-sm mt-1 w-16 dark:text-gray-900" wire:keydown.enter="addDetails">

                            <span class="px-2">No. of logs added: {{ count($permitdetails) }}</span>


                            <div class="py-1">
                                <button type="submit" name='submit' class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-40" wire:click.prevent="importLogsExcel()">
                                    Import Excel file
                                </button>
                                <input id="file" wire:model="logs_sheet" type="file" name="file" class="form-control rounded-md shadow-sm mt-1"/>
                            </div>
                            <div>
                                <button wire:click.prevent="downloadSample" class="px-2">
                                    Import Format
                                </button>
                                <button wire:click.prevent="downloadCode">
                                    Import Codes
                                </button>
                            </div>

                            <x-jet-input-error for="logs_sheet"></x-jet-input-error>

                            <x-jet-action-message on="">
                                Logs Imported!
                            </x-jet-action-message>
                        </div>
                        <div>
                            Note: SN=Serial No., L=Length, W=Width, L=Height, DS=Defect Symbol, DL=Defect Length, DA=Defect Area
                        </div>
                    </div>
                </div>





            </div>


            <div class="flex space-x-4 items-center justify-end px-4 py-3 bg-gray-50  dark:bg-stone-600 text-right sm:px-6">
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
