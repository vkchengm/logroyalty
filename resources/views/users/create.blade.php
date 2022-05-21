<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight"> --}}
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

            Create Internal User
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('users.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">

                            <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Name</label>
                            {{-- <label for="name" class="block font-medium text-sm text-gray-700">Name</label> --}}
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', '') }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Email</label>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('email', '') }}" />
                            @error('email')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="district" class="block font-medium text-sm text-gray-700 dark:text-gray-200">District</label>
                            <input type="text" name="district" id="district" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('district', '') }}" />
                            @error('district')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>                         --}}

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="password" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Password</label>
                            <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('password')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="roles" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Roles</label>
                            <select name="roles[]" id="roles" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"{{ in_array($id, old('roles', [])) ? ' selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('roles')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-stone-600 text-right sm:px-6">
                            <a href="{{ route('users.index-internal') }}"  class="pr-4">
                                <img src="{{ asset('back-arrow-svgrepo-com.svg') }}" alt="My SVG Icon" width="25" height="25">
                            </a>
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>