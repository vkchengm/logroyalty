
{{-- <div class="py-4 space-y-4">
</div> --}}

<div class="flex-col space-y-4 py-2">
    <input wire:model="search" type="text" placeholder="Search mark no. or owner" class="rounded-md shadow-sm"/>
    {{-- <input wire:model="status" type="text" placeholder="Status Filter" class="rounded-md shadow-sm"/> --}}
    {{-- <select wire:model="status" type="text" placeholder="Status Filter" class="rounded-md shadow-sm w-32">
        <option value="active">Active</option>
        <option value="canceled">Canceled</option>
    </select> --}}

    <x-table>

        <x-slot name="head">

            <x-table.heading sortable wire:click="sortBy('type')" :direction="$sortField === 'type' ? $sortDirection : null">Type</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('number')" :direction="$sortField === 'number' ? $sortDirection : null">Hammer Mark No.</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('employee_name')" :direction="$sortField === 'employee_name' ? $sortDirection : null">Employee Name</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('employee_id')" :direction="$sortField === 'employee_id' ? $sortDirection : null">Employee ID</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('ic')" :direction="$sortField === 'ic' ? $sortDirection : null">IC</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('old_ic')" :direction="$sortField === 'old_ic' ? $sortDirection : null">Old IC</x-table.heading>
            <x-table.heading sortable wire:click="sortBy('status')" :direction="$sortField === 'status' ? $sortDirection : null">Status</x-table.heading>
            {{-- <x-table.heading sortable>Position</x-table.heading> --}}
            {{-- <x-table.heading sortable>District</x-table.heading> --}}
            <x-table.heading></x-table.heading>
            <x-table.heading></x-table.heading>
            <x-table.heading></x-table.heading>

        </x-slot>

        <x-slot name="body">
            @foreach ($hammermarks as $hammermark)
                
                <x-table.row>
                    <x-table.cell>{{ $hammermark->type }}</x-table.cell>
                    <x-table.cell>{{ $hammermark->number }}</x-table.cell>
                    <x-table.cell>{{ $hammermark->employee_name }}</x-table.cell>
                    <x-table.cell>{{ $hammermark->employee_id }}</x-table.cell>
                    <x-table.cell>{{ $hammermark->ic }}</x-table.cell>
                    <x-table.cell>{{ $hammermark->old_ic }}</x-table.cell>
                    <x-table.cell>{{ strtoupper($hammermark->status) }}</x-table.cell>
                    {{-- <x-table.cell>{{ $hammermark->position }}</x-table.cell> --}}
                    {{-- <x-table.cell>{{ $hammermark->district->name ?? '' }}</x-table.cell> --}}

                    <x-table.cell>
                        <a href="{{ route('hammermarks.edit', $hammermark->id) }}" class="text-indigo-500 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                    </x-table.cell>

                    {{-- @if ($hammermark->status == 'D')
                        <x-table.cell>
                            <a href="{{ route('hammermarks.activate', $hammermark->id) }}" class="text-indigo-500 hover:text-indigo-900 mb-2 mr-2">Activate</a>

                        </x-table.cell>
                    @else
                        <x-table.cell>
                            <a href="{{ route('hammermarks.deactivate', $hammermark->id) }}" class="text-indigo-500 hover:text-indigo-900 mb-2 mr-2">Deactivate</a>

                        </x-table.cell>
                    @endif --}}
                    
                    <x-table.cell>
                        <form class="inline-block" action="{{ route('hammermarks.destroy', $hammermark->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                        </form>
                    </x-table.cell>

                </x-table.row>

            @endforeach

        </x-slot>


    </x-table>

    <div>
        {{ $hammermarks->links() }}
    </div>

</div>
