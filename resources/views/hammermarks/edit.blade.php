<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Hammer Mark
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('hammermarks.update', $hammermark->id) }}">
                    @csrf
                    @method('put')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Hammer Mark No.</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', $hammermark->name) }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="employee_id" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Employee ID</label>
                            <input type="text" name="employee_id" id="employee_id" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('employee_id', $hammermark->employee_id) }}" />
                            @error('employee_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="employee_name" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Employee Name</label>
                            <input type="text" name="employee_name" id="employee_name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('employee_name', $hammermark->employee_name) }}" />
                            @error('employee_name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="position" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Position</label>
                            <input type="text" name="position" id="position" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('position', $hammermark->position) }}" />
                            @error('position')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="district_id" class="block font-medium text-sm text-gray-700 dark:text-gray-200">District</label>
                            <select name="district_id" id="district_id" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                <option value="">Please select</option>
                                @foreach($districts as $id => $district)
                                    <option value="{{ $id }}" {{ (isset($hammermark) && $hammermark->district ? $hammermark->district->id : old('district_id')) == $id ? 'selected' : '' }}>
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

                        {{-- <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="district_id" class="block font-medium text-sm text-gray-700 dark:text-gray-200">District</label>
                            <input type="text" name="district_id" id="district_id" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('district_id', $hammermark->district_id) }}" />
                            @error('district_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div> --}}

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-stone-600 text-right sm:px-6">
                            <a href="{{ route('hammermarks.index') }}"  class="pr-4">
                                <img src="{{ asset('back-arrow-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25">
                            </a>

                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>