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
                                    <th class="font-light" rowspan="2">Region</th>
                                    <th class="font-light" rowspan="2">District</th>
                                    <th class="font-light" rowspan="2">Licensee</th>
                                    <th class="font-light text-center" colspan="3">> 60cm</th>
                                    <th class="font-light text-center" colspan="3">44cm - 59cm</th>
                                    <th class="font-light text-center" colspan="3">30cm - 43cm</th>
                                    <th class="font-light text-center" colspan="3">< 29cm</th>
                                    <th class="font-light text-center" colspan="3">Total</th>
                                </tr>
                                <tr class="text-center">
                                    <th class="font-light text-right">RIL</th>
                                    <th class="font-light text-right">Non RIL</th>
                                    <th class="font-light text-right">Total</th>

                                    <th class="font-light text-right">RIL</th>
                                    <th class="font-light text-right">Non RIL</th>
                                    <th class="font-light text-right">Total</th>

                                    <th class="font-light text-right">RIL</th>
                                    <th class="font-light text-right">Non RIL</th>
                                    <th class="font-light text-right">Total</th>

                                    <th class="font-light text-right">RIL</th>
                                    <th class="font-light text-right">Non RIL</th>
                                    <th class="font-light text-right">Total</th>

                                    <th class="font-light text-right">RIL</th>
                                    <th class="font-light text-right">Non RIL</th>
                                    <th class="font-light text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($permits as $index => $permit)
                                    <tr class="break-words">
                                        <td>{{ $permit->district->region->name }}</td>
                                        <td>{{ $permit->district->name }}</td>
                                        <td>{{ $permit->user->licensee->name }}</td>

                                        <td class='text-right'>{{ number_format($permit->ril_vol_more_than_59) }}</td>
                                        <td class='text-right'>{{ number_format($permit->non_ril_vol_more_than_59) }}</td>
                                        <td class='text-right'>{{ number_format($permit->total_more_than_59) }}</td>

                                        <td class='text-right'>{{ number_format($permit->ril_vol_between_44_to_59) }}</td>
                                        <td class='text-right'>{{ number_format($permit->non_ril_vol_between_44_to_59) }}</td>
                                        <td class='text-right'>{{ number_format($permit->total_between_44_to_59) }}</td>

                                        <td class='text-right'>{{ number_format($permit->ril_vol_between_30_to_44) }}</td>
                                        <td class='text-right'>{{ number_format($permit->non_ril_vol_between_30_to_44) }}</td>
                                        <td class='text-right'>{{ number_format($permit->total_between_30_to_44) }}</td>

                                        <td class='text-right'>{{ number_format($permit->ril_vol_less_than_29) }}</td>
                                        <td class='text-right'>{{ number_format($permit->non_ril_vol_less_than_29) }}</td>
                                        <td class='text-right'>{{ number_format($permit->total_less_than_29) }}</td>

                                        <td class='text-right'>{{ number_format($permit->ril_vol) }}</td>
                                        <td class='text-right'>{{ number_format($permit->non_ril_vol) }}</td>
                                        <td class='text-right'>{{ number_format($permit->total_vol) }}</td>
                                    </tr>
                                @endforeach

                                <tr class="break-words border-t border-gray-300">
                                    <td colspan="2">Total</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    <td class='text-right'>
                                        {{ number_format($rilTotal) }}
                                    </td>

                                    <td class='text-right'>
                                        {{ number_format($nonRilTotal) }}
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
