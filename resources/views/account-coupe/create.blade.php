<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Add License Account Coupe
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="POST" action="{{ route('licenses.licenseAccCoupe.store', ['license' => $license]) }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="account_no" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Account Number</label>
                            <input type="text" name="account_no" id="account_no" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('account_no', '') }}" />
                            @error('account_no')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="coupe_no" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Coupe Number</label>
                            <input type="text" name="coupe_no" id="coupe_no" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('coupe_no', '') }}" />
                            @error('coupe_no')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- <div class="px-4 py-5 bg-white dark:bg-stone-600  sm:p-6">
                            <label for="issued_date" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Issue Date</label>
                            <input type="date" name="issued_date" id="issued_date" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('issued_date', '') }}" />

                            @error('issued_date')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600  sm:p-6">
                            <label for="start_date" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('start_date', '') }}" />

                            @error('start_date')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600  sm:p-6">
                            <label for="expiry_date" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Expiry Date</label>
                            <input type="date" name="expiry_date" id="expiry_date" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('expiry_date', '') }}" />

                            @error('expiry_date')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="px-4 py-5 bg-white dark:bg-stone-600  sm:p-6">
                            <label for="land_type" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Land Type</label>
                            <select name="land_type" id="type" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                <option value="" selected>Please select</option>

                                @foreach($landTypes as $id => $name)
                                    <option {{ old('land_type') == $id ? 'selected' : '' }} value="{{ $id }}">
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('land_type')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div> --}}

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-stone-600 text-right sm:px-6">
                            <a href="{{ route('licensees.show', ['licensee' => $license->licensee]) }}"  class="pr-4">
                                <img src="{{ asset('back-arrow-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25">
                            </a>

                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
