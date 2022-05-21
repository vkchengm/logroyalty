<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Region
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('regions.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Name</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', '') }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="fos" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Regional Financial Officer</label>
                            <select name="fo_id" id="fo" class="form-control rounded-md shadow-sm mt-1 block w-full">
                                @foreach($fos as $id => $fo)
                                    <option value="{{ $id }}" {{ (isset($region) && $region->fo ? $region->fo->id : old('fo_id')) == $id ? 'selected' : '' }}>
                                        {{ $fo }}
                                    </option>
                            @endforeach
                            </select>
                            @if($errors->has('fo_id'))
                                <p class="help-block">
                                    {{ $errors->first('fo_id') }}
                                </p>
                            @endif
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="ppw" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Regional Officer</label>
                            <select name="ppw_id" id="ppw" class="form-control rounded-md shadow-sm mt-1 block w-full">
                                @foreach($ppws as $id => $ppw)
                                    <option value="{{ $id }}" {{ (isset($region) && $region->ppw ? $region->ppw->id : old('ppw_id')) == $id ? 'selected' : '' }}>
                                        {{ $ppw }}
                                    </option>
                            @endforeach
                            </select>
                            @if($errors->has('ppw_id'))
                                <p class="help-block">
                                    {{ $errors->first('ppw_id') }}
                                </p>
                            @endif
                        </div>

                        <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="tppw" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Assistance Regional Officer</label>
                            <select name="tppw_id" id="tppw" class="form-control rounded-md shadow-sm mt-1 block w-full">
                                @foreach($tppws as $id => $tppw)
                                    <option value="{{ $id }}" {{ (isset($region) && $region->tppw ? $region->tppw->id : old('tppw_id')) == $id ? 'selected' : '' }}>
                                        {{ $tppw }}
                                    </option>
                            @endforeach
                            </select>
                            @if($errors->has('tppw_id'))
                                <p class="help-block">
                                    {{ $errors->first('tppw_id') }}
                                </p>
                            @endif
                        </div>

                        <!-- For defining select2 -->
                        {{-- <div class="px-4 py-5 bg-white dark:bg-stone-600 sm:p-6">
                            <label for="fos" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Regional Financial Officer</label>
                            <select name='fo_id' id='fo_id' class="form-control rounded-md shadow-sm mt-1 block w-full">
                                <option value=''>-- Select FO --</option>
                            </select>
                            @if($errors->has('fo_id'))
                                <p class="help-block">
                                    {{ $errors->first('fo_id') }}
                                </p>
                            @endif
                        </div> --}}

                        <!-- Script -->
                        {{-- <script type="text/javascript">
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            $(document).ready(function(){
                        
                            $( "#fo_id" ).select2({
                                ajax: { 
                                url: "{{route('getFos')}}",
                                type: "post",
                                dataType: 'json',
                                delay: 250,
                                data: function (params) {
                                    return {
                                        _token: CSRF_TOKEN,
                                        search: params.term // search term
                                    };
                                },
                                processResults: function (response) {
                                    return {
                                    results: response
                                    };
                                },
                                cache: true
                                }
                        
                            });
                        
                            });
                        </script> --}}




                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-stone-600 text-right sm:px-6">
                            <a href="{{ route('regions.index') }}"  class="pr-4">
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