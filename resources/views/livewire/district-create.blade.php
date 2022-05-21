<div>
    <form method="post" action="{{ route('districts.store') }}">
        @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Name</label>
                <input type="text" name="name" id="name" wire:model.defer="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                       value="{{ old('name', '') }}" />
                @error('name')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                <label for="regions" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Region</label>
                <select name="region_id" id="region" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                    <option value="">Please select</option>
                    @foreach($regions as $id => $region)
                        <option value="{{ $id }}" {{ (isset($district) && $district->region ? $district->region->id : old('region_id')) == $id ? 'selected' : '' }}>
                            {{ $region }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('region_id'))
                    <p class="help-block">
                        {{ $errors->first('region_id') }}
                    </p>
                @endif
            </div>

            <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                <label for="dfos" class="block font-medium text-sm text-gray-700 dark:text-gray-200">DFO</label>
                <select name="dfo_id" id="dfo" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                    <option value="">Please select</option>
                    @foreach($dfos as $id => $dfo)
                        <option value="{{ $id }}" {{ (isset($district) && $district->dfo ? $district->dfo->id : old('dfo_id')) == $id ? 'selected' : '' }}>
                            {{ $dfo }}
                        </option>
                @endforeach
                </select>
                @if($errors->has('dfo_id'))
                    <p class="help-block">
                        {{ $errors->first('dfo_id') }}
                    </p>
                @endif
            </div>

            <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                <label for="adfos" class="block font-medium text-sm text-gray-700 dark:text-gray-200">ADFO</label>
                <select name="adfo_id" id="adfo" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                    <option value="">Please select</option>
                    @foreach($adfos as $id => $adfo)
                        <option value="{{ $id }}" {{ (isset($district) && $district->adfo ? $district->adfo->id : old('adfo_id')) == $id ? 'selected' : '' }}>
                            {{ $adfo }}
                        </option>
                @endforeach
                </select>
                @if($errors->has('adfo_id'))
                    <p class="help-block">
                        {{ $errors->first('adfo_id') }}
                    </p>
                @endif
            </div>

            <div class="flex items-end px-4 py-2 bg-white dark:bg-stone-600 sm:px-6">
                <div>
                    <label for="kppms" class="block font-medium text-sm text-gray-700 dark:text-gray-200">KPPM</label>
                    <select name="selectedKPPM" id="kppm" wire:model.defer="selectedKPPM" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                        <option value="">Please select</option>
                        @foreach($kppms as $id => $kppm)
                            {{-- <option value="{{ $id }}" {{ (isset($district) && $district->kppm ? $district->kppm->id : old('kppm_id')) == $id ? 'selected' : '' }}> --}}
                            <option value="{{ $kppm->id }}" >
                                {{ $kppm->name }}
                            </option>
                        @endforeach
                    </select>
                    
                </div>
                
                <div class="align-bottom px-2">
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" wire:click.prevent="addKPPM">
                        Add
                      </button>
                </div>

            </div>
            <div class="flex items-end px-8 py-1 bg-white dark:bg-stone-600">
                <div class="grid grid-cols-1">
                    @foreach($districtKPPMs as $id => $kppm)
                        <div class="flex items-center">
                            <div>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" wire:click.prevent="removeKPPM({{ $id }})">
                                    Delete
                                </button>
                            </div>
                            <div class="px-2">
                                <input type="text" class="border-transparent dark:bg-stone-600 dark:text-gray-200" readonly
                                name="districtKPPMs[{{ $id }}][kppm_name]" 
                                size="20"
                                wire:model="districtKPPMs.{{ $id }}.kppm_name" />

                                <input type="text" class="border-transparent" readonly hidden
                                name="districtKPPMs[{{ $id }}][kppm_id]" 
                                size="20"
                                wire:model="districtKPPMs.{{ $id }}.kppm_id" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>


            </div>

            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-stone-600 text-right sm:px-6">
                <a href="{{ route('districts.index') }}"  class="pr-4">
                    <img src="{{ asset('back-arrow-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25">
                </a>
            {{-- <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"> --}}
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Create
                </button>
            </div>
        </div>
    </form>
</div>
