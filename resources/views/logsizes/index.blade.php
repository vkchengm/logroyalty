<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Log Sizes List
        </h2>
    </x-slot>

    <div class="px-2 py-1">
        <div class="max-w-6xl mx-auto py-4 sm:px-6 lg:px-8">

            <div class="block mb-8">
                <a href="{{ route('logsizes.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add Log Size</a>
            </div>

            <div class="flex flex-col">


                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="table table-bordered table-striped datatable min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        From Size
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        To Size
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-200 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Unit
                                    </th>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-200">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-stone-600 divide-y divide-gray-200">
                                @foreach ($logsizes as $logSize)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            {{ $logSize->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            {{ $logSize->fr_size }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            {{ $logSize->to_size }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                            {{ $logSize->unit }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            @if($logSize->id != 1) 
                                            <a href="{{ route('logsizes.edit', $logSize->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                            <form class="inline-block" action="{{ route('logsizes.destroy', $logSize->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
