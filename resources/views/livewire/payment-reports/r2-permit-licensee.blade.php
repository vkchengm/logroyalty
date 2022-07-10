<div>
    <div class="shadow overflow-hidden sm:rounded-md">
        {{-- Selections --}}
        <div class="px-6 bg-white dark:bg-stone-800 dark:text-gray-700 pt-4 pb-4">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 ">
                <div class="px-1">
                    <label for="licensee"
                           class="block font-medium text-sm text-gray-700 dark:text-white">
                        Licensee
                    </label>

                    <select name="licensee_id" id="licensee_id"
                            class="form-control select2 rounded-md shadow-sm mt-1 block w-full"
                            wire:model="licenseeId">
                        <option value="" selected>
                            All
                        </option>

                        @foreach($licenseeList as $id => $licensee)
                            <option
                                value="{{ $id }}" {{ old('licensee_id') == $id ? 'selected' : '' }}>
                                {{ $licensee }}
                            </option>
                        @endforeach
                    </select>

                    @if($errors->has('licensee_id'))
                        <p class="help-block">
                            {{ $errors->first('licensee_id') }}
                        </p>
                    @endif
                </div>

                <div class="px-1 ">
                    <label for="year" class="block font-medium text-sm text-gray-700 dark:text-white ">
                        Year
                    </label>

                    <select class="form-control select2 rounded-md shadow-sm mt-1 block w-full"
                            wire:ignore
                            wire:model="selectedYear">
                        <option value="" selected>
                            All
                        </option>

                        @foreach($yearList as $year)
                            <option value="{{ $year }}">
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>

                    @if($errors->has('selectedYear'))
                        <p class="help-block">
                            {{ $errors->first('selectedYear') }}
                        </p>
                    @endif
                </div>

                <div class="px-1 @if(!$selectedYear) hidden @endif">
                    <label for="year" class="block font-medium text-sm text-gray-700 dark:text-white ">
                        Month
                    </label>

                    <select class="form-control select2 rounded-md shadow-sm mt-1 block w-full"
                            wire:ignore
                            wire:model="selectedMonth">
                        <option value="" selected>
                            All
                        </option>

                        @foreach($monthList as $id => $month)
                            <option value="{{ $id }}" >
                                {{ $month }}
                            </option>
                        @endforeach
                    </select>

                    @if($errors->has('monthSelected'))
                        <p class="help-block">
                            {{ $errors->first('monthSelected') }}
                        </p>
                    @endif
                </div>

                <div class="px-1">
                    <label for="Regions" class="block font-medium text-sm text-gray-700 dark:text-white">
                        Region
                    </label>

                    <select class="form-control select2 rounded-md shadow-sm mt-1 block w-full"
                            wire:model="regionId">
                        <option value="" selected>
                            All
                        </option>

                        @foreach($regionList as $id => $region)
                            <option value="{{ $id }}">
                                {{ $region }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="px-1">
                    <label for="districts"
                           class="block font-medium text-sm text-gray-700 dark:text-white">
                        District
                    </label>

                    <select class="form-control select2 rounded-md shadow-sm mt-1 block w-full"
                            wire:model="districtId">
                        <option value="" selected>
                            All
                        </option>

                        @foreach($districtList as $id => $district)
                            <option value="{{ $id }}">
                                {{ $district }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        {{-- Summary --}}
        <div class="px-6 bg-white dark:bg-stone-600 dark:text-white pt-2 pb-2">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 ">
                <div class="px-1">
                    <label for="year" class="block font-medium text-sm text-gray-700 dark:text-white">
                        Total Volume
                    </label>

                    <div class="px-2">
                        {{ $totalVol }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Report --}}
        <div class="px-4 bg-white dark:bg-stone-600 dark:text-gray-200 sm:p-6">
            <div>
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 " id="products_table">
                                <thead>
                                <tr class="break-words text-left">
                                    <th class="font-light">Licensee</th>
                                    <th class="font-light">Region</th>
                                    <th class="font-light">District</th>
                                    <th class="font-light text-right">RIL</th>
                                    <th class="font-light text-right">Non-RIL</th>
                                    <th class="font-light text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($permits as $index => $permit)
                                    <tr class="break-words">
                                        <td>
                                            {{ $permit->user->licensee->name }}
                                        </td>

                                        <td>
                                            {{ $permit->district->region->name }}
                                        </td>

                                        <td>
                                            {{ $permit->district->name }}
                                        </td>

                                        <td class='text-right'>
                                            {{ number_format($permit->ril_vol) }}
                                        </td>
                                        <td class='text-right'>
                                            {{ number_format($permit->non_ril_vol) }}
                                        </td>

                                        <td class='text-right'>
                                            {{ number_format($permit->total_vol) }}
                                        </td>
                                    </tr>
                                @endforeach

                                <tr class="break-words border-t border-gray-300">
                                    <td>
                                        Total
                                    </td>

                                    <td></td>

                                    <td></td>

                                    <td class='text-right'>
                                        {{ number_format($permits->sum('ril_vol')) }}
                                    </td>

                                    <td class='text-right'>
                                        {{ number_format($permits->sum('non_ril_vol')) }}
                                    </td>

                                    <td class='text-right'>
                                        {{ number_format($permits->sum('total_vol')) }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
