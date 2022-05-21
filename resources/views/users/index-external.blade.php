<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">
            External Users List
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                
                {{-- <div class="p-6 bg-white dark:bg-stone-700">
                    <a href="{{ route('users.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add User</a>
                </div> --}}
                @if (count($users) != 0)

                    <div class="flex flex-col">

                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="table table-bordered table-striped datatable min-w-full divide-y divide-gray-200 w-full">
                                        <thead>
                                        <tr>
                                            {{-- <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                ID
                                            </th> --}}
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-200  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-200  text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Email
                                            </th>
                                            <th scope="col" width="200" class="px-6 py-3 bg-gray-50 dark:bg-stone-800 dark:text-gray-200 ">

                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white dark:bg-stone-600 divide-y divide-gray-200">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                                    {{ $user->name }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-200">
                                                    {{ $user->email }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <button onclick="Livewire.emit('openModal', 'user-activate', {{ json_encode([$user]) }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Activate User</button>
                                                    {{-- <a href="{{ route('users.activate', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Activate</a> --}}
                                                    {{-- <form class="inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');"> --}}
                                                    <form class="inline-block" action="{{ route('users.destroyexternal', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                @endif
                    
                {{-- <div class="bg-white dark:bg-stone-700">
                    <livewire:users-external-table />
                </div> --}}
                
                <div class="py-4">
                
                </div>

                <div class="bg-white dark:bg-stone-700">
                    <livewire:users-external-table />
                </div>

            </div>
        </div>
    </div>
</x-app-layout>