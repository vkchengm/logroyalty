
{{-- <div class="py-4 space-y-4">
</div> --}}

<div class="flex-col space-y-4 py-4">
    <input wire:model="search" type="text" placeholder="Search mark no. or owner" class="rounded-md shadow-sm"/>

    <x-table>

        <x-slot name="head">

            <x-table.heading sortable>Hammer Mark No.</x-table.heading>
            <x-table.heading sortable>Employee Name</x-table.heading>
            <x-table.heading sortable>Employee ID</x-table.heading>
            <x-table.heading sortable>Position</x-table.heading>
            <x-table.heading sortable>District</x-table.heading>

        </x-slot>

        <x-slot name="body">
            @foreach ($hammermarks as $hammermark)
                
                <x-table.row>
                    <x-table.cell>{{ $hammermark->name }}</x-table.cell>
                    <x-table.cell>{{ $hammermark->employee_name }}</x-table.cell>
                    <x-table.cell>{{ $hammermark->employee_id }}</x-table.cell>
                    <x-table.cell>{{ $hammermark->position }}</x-table.cell>
                    <x-table.cell>{{ $hammermark->district->name }}</x-table.cell>
                </x-table.row>

            @endforeach

        </x-slot>


    </x-table>

    <div>
        {{ $hammermarks->links() }}
    </div>

</div>
