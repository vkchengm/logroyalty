<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Royalty Rate
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('royalties.update', $royalty->id) }}">
                    @csrf
                    @method('put')
                    <div class="flex flex-row shadow overflow-hidden sm:rounded-md bg-white dark:bg-stone-600">
                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="market" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Market</label>
                            <select name="market" id="market" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                {{-- <option value="" selected>
                                    Please select
                                </option> --}}
                                <option {{ ($royalty->market) == 'Export' ? 'selected' : '' }} value="Export">
                                        Export
                                </option>
                                <option {{ ($royalty->market) == 'Local Processing' ? 'selected' : '' }} value="Local Processing">
                                    Local Processing
                                </option>
                            </select>
                            @if($errors->has('market'))
                                <p class="help-block">
                                    {{ $errors->first('market') }}
                                </p>
                            @endif
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="class" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Class</label>
                            <select name="class" id="class" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                    {{-- <option value="" selected>
                                        Please select
                                    </option> --}}
                                    <option value="">Please select</option>
                                    <option {{ ($royalty->class) == 'A' ? 'selected' : '' }} value="A">A</option>
                                    <option {{ ($royalty->class) == 'B' ? 'selected' : '' }} value="B">B</option>
                                    <option {{ ($royalty->class) == 'C' ? 'selected' : '' }} value="C">C</option>
                                    <option {{ ($royalty->class) == 'D' ? 'selected' : '' }} value="D">D</option>
                                    <option {{ ($royalty->class) == 'E' ? 'selected' : '' }} value="E">E</option>
                                    <option {{ ($royalty->class) == 'F' ? 'selected' : '' }} value="F">F</option>
                                    <option {{ ($royalty->class) == 'G' ? 'selected' : '' }} value="G">G</option>
                                    <option {{ ($royalty->class) == 'H' ? 'selected' : '' }} value="H">H</option>
    
                            </select>
                            @if($errors->has('class'))
                                <p class="help-block">
                                    {{ $errors->first('class') }}
                                </p>
                            @endif
                        </div>

                        {{-- <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="class" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Class</label>
                            <input type="text" name="class" id="class" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('class', $royalty->class) }}" />
                            @error('class')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div> --}}
                        

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="timber_type" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Timber type</label>
                            <select name="timber_type" id="timber_type" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                    {{-- <option value="" selected>
                                        Please select
                                    </option> --}}
                                    <option value="">Please select</option>
                                    <option {{ ($royalty->timber_type) == 'natural' ? 'selected' : '' }} value="natural">Natural</option>
                                    <option {{ ($royalty->timber_type) == 'plantation' ? 'selected' : '' }} value="plantation">Plantation</option>
                                    <option {{ ($royalty->timber_type) == 'converted' ? 'selected' : '' }} value="converted">Converted</option>
    
                            </select>
                            @if($errors->has('timber_type'))
                                <p class="help-block">
                                    {{ $errors->first('timber_type') }}
                                </p>
                            @endif
                        </div>

                            {{-- <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="species" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Species</label>
                            <select name="species_id" id="specie" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                @foreach($species as $id => $specie)                                    
                                    <option value="{{ $id }}" {{ (isset($royalty) && $royalty->species ? $royalty->species->id : old('species_id')) == $id ? 'selected' : '' }}>
                                        {{ $specie }}
                                    </option>
                            @endforeach
                            </select>
                            @if($errors->has('species_id'))
                                <p class="help-block">
                                    {{ $errors->first('species_id') }}
                                </p>
                            @endif
                        </div> --}}
                        
                        
                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="landtype" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Land Type</label>
                            <select name="land_type_id" id="land_type_id" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                @foreach($landtypes as $id => $landtype)
                                <option value="{{ $id }}" {{ (isset($royalty) && $royalty->landtype ? $royalty->landtype->id : old('land_type_id')) == $id ? 'selected' : '' }}>
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
                        
                    </div>
                    
                    <div class="flex flex-row shadow overflow-hidden sm:rounded-md bg-white dark:bg-stone-600">
                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="method" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Method</label>
                            <select name="method" id="method" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                    {{-- <option value="" selected>
                                        Please select
                                    </option> --}}
                                    <option {{ ($royalty->method) == 'Non-RIL' ? 'selected' : '' }} value="Non-RIL">
                                        Non-RIL
                                    </option>
                                    <option {{ ($royalty->method) == 'RIL' ? 'selected' : '' }} value="RIL">
                                        RIL
                                    </option>
                                    <option {{ ($royalty->method) == 'Helicopter' ? 'selected' : '' }} value="Helicopter">
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
                                    <option value="{{ $id }}" {{ (isset($royalty) && $royalty->logsize ? $royalty->logsize->id : old('log_size_id')) == $id ? 'selected' : '' }}>
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
                                   value="{{ old('amount', $royalty->amount) }}" />
                            @error('amount')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-stone-600 text-right sm:px-6">
                        <a href="{{ route('royalties.index') }}"  class="pr-4">
                            <img src="{{ asset('back-arrow-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25">
                        </a>

                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </button>
                    </div>

                    {{-- <div class="flex flex-row shadow overflow-hidden sm:rounded-md bg-white dark:bg-stone-600">
                        <div class="flex items-center justify-end py-3 text-right  px-3">
                            <div class="block mt-8">
                                <a href="{{ route('royalties.index') }}" class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded">Cancel</a>
                            </div>
                        </div>

                        <div class="flex items-center justify-end py-3 text-right">
                            <div class="block mt-8">
                
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div> --}}

                </form>
            </div>
        </div>
    </div>
</x-app-layout>