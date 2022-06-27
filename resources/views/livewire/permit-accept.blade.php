<x-modal formAction="update">
    <x-slot name="title">
        <div class="pt-8">
        {{-- Inspection accepted for {{ $permit->license_no }} --}}
        Inspection rejected for TDP{{ str_pad($permit->id, 6, '0', STR_PAD_LEFT) }}
        
        </div>
    </x-slot>

    <x-slot name="content">
        <div>
            Name:
            <select id="hammer_mark_id" name="hammer_mark_id" class="block mt-1 w-full" type="text" wire:model.defer="permit.hammer_mark_id" />
                <option value="">Select Hammer Mark</option>
                @foreach ($hammermarks as $hammermark)
                    <option value={{ $hammermark->id }}>
                        {{ $hammermark->name.' - '. $hammermark->employee_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            Name of Scaler:
            <input id="name_of_scaler" class="block mt-1 w-full" type="text" wire:model.defer="permit.name_of_scaler" />
            
            @error('permit.name_of_scaler')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            Scaled Date:
            <input id="scaled_date" class="block mt-1 w-full" type="date" wire:model.defer="permit.scaled_date" />
            
            @error('permit.scaled_date')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            Notes:
            <input id="description" class="block mt-1 w-full" type="text" wire:model.defer="permitLogRemark" />
            
            @error('permitLogRemarkn')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </x-slot>

    <x-slot name="buttons">
        <div  class="py-4">

            <button wire:click.prevent="$emit('closeModal')" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Cancel</button>

            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Accept</button>
        </div>
    </x-slot>
    
</x-modal>

