<div>
    <div class="shadow overflow-hidden sm:rounded-md">
        {{-- Selections --}}
        <div class="px-6 bg-white dark:bg-stone-800 dark:text-gray-700 pt-4 pb-4">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 ">
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
                            <option value="{{ $id }}">
                                {{ $month }}
                            </option>
                        @endforeach
                    </select>

                    @if($errors->has('selectedMonth'))
                        <p class="help-block">
                            {{ $errors->first('selectedMonth') }}
                        </p>
                    @endif
                </div>

                <div class="px-1">
                    <label for="land_type"
                           class="block font-medium text-sm text-gray-700 dark:text-white">
                        Land Type
                    </label>

                    <select name="land_type" id="land_type"
                            class="form-control select2 rounded-md shadow-sm mt-1 block w-full"
                            wire:model="landTypeId">
                        <option value="" selected>
                            All
                        </option>

                        @foreach($landTypeList as $id => $land)
                            <option value="{{ $id }}">
                                {{ $land }}
                            </option>
                        @endforeach
                    </select>

                    @if($errors->has('landTypeId'))
                        <p class="help-block">
                            {{ $errors->first('landTypeId') }}
                        </p>
                    @endif
                </div>

                <div class="px-1">
                    <label for="land_type"
                           class="block font-medium text-sm text-gray-700 dark:text-white">
                        Market Type
                    </label>

                    <select name="land_type" id="land_type"
                            class="form-control select2 rounded-md shadow-sm mt-1 block w-full"
                            wire:model="landTypeId">
                        <option value="" selected>
                            All
                        </option>

                        @foreach($marketTypeList as $id => $market)
                            <option value="{{ $id }}">
                                {{ $market }}
                            </option>
                        @endforeach
                    </select>

                    @if($errors->has('marketType'))
                        <p class="help-block">
                            {{ $errors->first('marketType') }}
                        </p>
                    @endif
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
                        {{ $total }}
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
                                    <th class="font-light">Year</th>
                                    <th class="font-light">Month</th>
                                    <th class="font-light">Region</th>
                                    <th class="font-light">District</th>
                                    <th class="font-light">Licensee</th>
                                    <th class="font-light text-right">> 60cm</th>
                                    <th class="font-light text-right">44cm - 59cm</th>
                                    <th class="font-light text-right">30cm - 43cm</th>
                                    <th class="font-light text-right">< 29cm</th>
                                    <th class="font-light text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($permits as $index => $permit)
                                    <tr class="break-words">
                                        <td>
                                            {{ $permit->year }}
                                        </td>

                                        <td>
                                            {{ $this->getMonth($permit->month) }}
                                        </td>

                                        <td>
                                            {{ $permit->region }}
                                        </td>

                                        <td>
                                            {{ $permit->district }}
                                        </td>

                                        <td>
                                            {{ $permit->licensee }}
                                        </td>

                                        <td class='text-right'>
                                            {{ number_format($permit->more_than_59) }}
                                        </td>

                                        <td class='text-right'>
                                            {{ number_format($permit->between_44_to_59) }}
                                        </td>

                                        <td class='text-right'>
                                            {{ number_format($permit->between_30_to_43) }}
                                        </td>

                                        <td class='text-right'>
                                            {{ number_format($permit->less_than_30) }}
                                        </td>

                                        <td class='text-right'>
                                            {{ number_format($permit->total) }}
                                        </td>
                                    </tr>
                                @endforeach

                                <tr class="break-words border-t border-gray-300">
                                    <td>
                                        Total
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td class='text-right'>
                                        {{ number_format($moreThan59) }}
                                    </td>

                                    <td class='text-right'>
                                        {{ number_format($between44to59) }}
                                    </td>

                                    <td class='text-right'>
                                        {{ number_format($between30to43) }}
                                    </td>

                                    <td class='text-right'>
                                        {{ number_format($lessThan30) }}
                                    </td>

                                    <td class='text-right'>
                                        {{ number_format($total) }}
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
