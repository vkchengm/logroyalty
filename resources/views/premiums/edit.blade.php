<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Premium Rate
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('premiums.update', $premium->id) }}">
                    @csrf
                    @method('put')
                    <div class="flex flex-row shadow overflow-hidden sm:rounded-md bg-white dark:bg-stone-600">
                       
                        <div class="px-4 py-5 bg-white dark:bg-stone-600  sm:p-6">
                            <label for="landtype" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Land Type</label>
                            <select name="land_type_id" id="land_type_id" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                @foreach($landtypes as $id => $landtype)
                                    <option value="{{ $id }}" {{ (isset($premium) && $premium->landtype ? $premium->landtype->id : old('land_type_id')) == $id ? 'selected' : '' }}>
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

                        <div class="px-4 py-5 bg-white dark:bg-stone-600  sm:p-6">
                            <label for="licensew_type" class="block font-medium text-sm text-gray-700 dark:text-gray-200">License Type</label>
                            <select name="licensew_type" id="licensew_type" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                <option {{ ($premium->licensew_type) == 'YAYASAN SABAH' ? 'selected' : '' }} value="YAYASAN SABAH">
                                    YAYASAN SABAH
                                </option>
                                <option {{ ($premium->licensew_type) == 'BENTA WAWASAN SDN BHD' ? 'selected' : '' }} value="BENTA WAWASAN SDN BHD">
                                    BENTA WAWASAN SDN BHD
                                </option>
                                <option {{ ($premium->licensew_type) == 'OTHERS' ? 'selected' : '' }} value="OTHERS">
                                    OTHERS
                                </option>
                            </select>
                            @if($errors->has('licensew_type'))
                                <p class="help-block">
                                    {{ $errors->first('licensew_type') }}
                                </p>
                            @endif
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600  sm:p-6">
                            <label for="logsize" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Log Size</label>
                            <select name="log_size_id" id="log_size_id" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                @foreach($logsizes as $id => $logsize)
                                    <option value="{{ $id }}" {{ (isset($premium) && $premium->logsize ? $premium->logsize->id : old('log_size_id')) == $id ? 'selected' : '' }}>
                                        {{ $logsize }}
                                    </option>
                            @endforeach
                            </select>
                            @if($errors->has('log_size_id'))
                                <p class="help-block">
                                    {{ $errors->first('log_size_id') }}
                                </p>
                            @endif
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600  sm:p-6">
                            <label for="amount" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('amount', $premium->amount) }}" />
                            @error('amount')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                    </div>
                    
                    {{-- <div class="flex flex-row shadow overflow-hidden sm:rounded-md bg-white dark:bg-stone-600">

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="landtype" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Land Type</label>
                            <select name="land_type_id" id="land_type_id" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                @foreach($landtypes as $id => $landtype)
                                    <option value="{{ $id }}" {{ (isset($premium) && $premium->landtype ? $premium->landtype->id : old('land_type_id')) == $id ? 'selected' : '' }}>
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

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="method" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Method</label>
                            <select name="method" id="method" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                    <option {{ ($premium->method) == 'Non-RIL' ? 'selected' : '' }} value="Non-RIL">
                                        Non-RIL
                                    </option>
                                    <option {{ ($premium->method) == 'RIL' ? 'selected' : '' }} value="RIL">
                                        RIL
                                    </option>
                                    <option {{ ($premium->method) == 'Helicopter' ? 'selected' : '' }} value="Helicopter">
                                        Helicopter
                                    </option>
                            </select>
                            @if($errors->has('method'))
                                <p class="help-block">
                                    {{ $errors->first('method') }}
                                </p>
                            @endif
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="logsize" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Log Size</label>
                            <select name="log_size_id" id="log_size_id" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                @foreach($logsizes as $id => $logsize)
                                    <option value="{{ $id }}" {{ (isset($premium) && $premium->logsize ? $premium->logsize->id : old('log_size_id')) == $id ? 'selected' : '' }}>
                                        {{ $logsize }}
                                    </option>
                            @endforeach
                            </select>
                            @if($errors->has('log_size_id'))
                                <p class="help-block">
                                    {{ $errors->first('log_size_id') }}
                                </p>
                            @endif
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="amount" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Amount</label>
                            <input type="text" name="amount" id="amount" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('amount', $premium->amount) }}" />
                            @error('amount')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div> --}}

                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-stone-600 text-right sm:px-6">
                        <a href="{{ route('premiums.index') }}"  class="pr-4">
                            <img src="{{ asset('back-arrow-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25">
                        </a>

                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>