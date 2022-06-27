<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Hammer Marks List
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                
                {{-- <div class="p-6 bg-white dark:bg-stone-700">
                    <a href="{{ route('users.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add User</a>
                </div> --}}
                <div class="bg-white dark:bg-stone-700">
                        <livewire:hammer-marks-table />
                    {{-- @livewire('hammermarks-table') --}}

                </div>

            </div>
        </div>
    </div>

    {{-- <x-table>

        <x-slot name="head">

            <x-table.heading sortable>Hey</x-table.heading>
            <x-table.heading sortable>There</x-table.heading>

        </x-slot>

        <x-slot name="body">

            <x-table.row>
                <x-table.cell>One</x-table.cell>
                <x-table.cell>Two</x-table.cell>
            </x-table.row>

            <x-table.row>
                <x-table.cell>One</x-table.cell>
                <x-table.cell>Two</x-table.cell>
            </x-table.row>
            
            <x-table.row>
                <x-table.cell>One</x-table.cell>
                <x-table.cell>Two</x-table.cell>
            </x-table.row>

        </x-slot>


    </x-table> --}}


    {{-- <div class="px-2 py-1">
        <div class="max-w-6xl mx-auto py-4 sm:px-6 lg:px-8">

            <div class="block mb-8">
                <a href="{{ route('hammermarks.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Hammer Mark</a>
            </div>

            <div class="flex flex-col">


                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="table table-bordered table-striped datatable min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Hammer Mark No.
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Owner name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Position
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        District
                                    </th>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-200">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-stone-600 divide-y divide-gray-200">
                                @foreach ($hammermarks as $hammermark)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            {{ $hammermark->name }}
                                            @if ($hammermark->status == 'D')
                                                <br>Terminated date:{{ ($hammermark->deactivate_date) }}
                                                <br>Terminated reason: 
                                                <br>{{ $hammermark->deactivate_reason }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            {{ $hammermark->employee_name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            {{ $hammermark->position }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            {{ $hammermark->district->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            {{ $hammermark->district->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('hammermarks.edit', $hammermark->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                            @if ($hammermark->status == 'A')
                                                <form class="inline-block" action="{{ route('hammermarks.destroy', $hammermark->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Terminate">
                                                </form>       
                                            @else
                                            <form class="inline-block" action="{{ route('hammermarks.destroy', $hammermark->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Re-activate">
                                            </form>       
                                        @endif

                                            {{-- <form class="inline-block" action="{{ route('hammermarks.destroy', $hammermark->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                            </form>                                                 --}}

{{--                                          </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> --}}
</x-app-layout>
