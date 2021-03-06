<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Species
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('species.update', $species->id) }}">
                    @csrf
                    @method('put')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Name</label>
                            <input type="text" name="name" id="name" oninput="this.value = this.value.toUpperCase()" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', $species->name) }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600  sm:p-6">
                            <label for="type" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Type</label>
                            <select name="type" id="type" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                <option {{ ($species->type) == 'Natural' ? 'selected' : '' }} value="Natural" >
                                    Natural
                                </option>
                                <option {{ ($species->type) == 'Plantation' ? 'selected' : '' }} value="Plantation" >
                                    Plantation
                                </option>
                                <option {{ ($species->type) == 'Both' ? 'selected' : '' }} value="Both" >
                                    Both
                                </option>
                            </select>
                            @if($errors->has('type'))
                                <p class="help-block">
                                    {{ $errors->first('type') }}
                                </p>
                            @endif
                        </div>
                        <div class="px-4 py-5 bg-white dark:bg-stone-600  sm:p-6">
                            <label for="class" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Class</label>
                            <select name="class" id="class" class="form-control select2 rounded-md shadow-sm mt-1 block w-full">
                                <option value="" selected>
                                    Please select
                                </option>
                                <option value='A' {{ ($species->class) == 'A' ? 'selected' : '' }}>
                                    A
                                </option>
                                <option value='B' {{ ($species->class) == 'B' ? 'selected' : '' }}>
                                    B
                                </option>
                                <option value='C' {{ ($species->class) == 'C' ? 'selected' : '' }}>
                                    C
                                </option>
                                <option value='D' {{ ($species->class) == 'D' ? 'selected' : '' }}>
                                    D
                                </option>
                                <option value='E' {{ ($species->class) == 'E' ? 'selected' : '' }}>
                                    E
                                </option>
                                <option value='F' {{ ($species->class) == 'F' ? 'selected' : '' }}>
                                    F
                                </option>
                                <option value='G' {{ ($species->class) == 'G' ? 'selected' : '' }}>
                                    G
                                </option>
                                <option value='H' {{ ($species->class) == 'H' ? 'selected' : '' }}>
                                    H
                                </option>
                            </select>
                            @if($errors->has('class'))
                                <p class="help-block">
                                    {{ $errors->first('class') }}
                                </p>
                            @endif
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="import_code" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Import Code</label>
                            <input type="text" name="import_code" id="import_code" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('import_code', $species->import_code) }}" />
                            @error('import_code')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-stone-600 text-right sm:px-6">
                            <a href="{{ route('species.index') }}"  class="pr-4">
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