<x-modal formAction="update">
    <x-slot name="title">
        <div class="pt-8">
            Inspection rejected for TDP{{ str_pad($permit->id, 6, '0', STR_PAD_LEFT) }}
        </div>
    </x-slot>

    <x-slot name="content">

        <div>
            Notes:
            <input id="description" class="block mt-1 w-full" type="text" wire:model.defer="permitLogRemark" />
            
            @error('permitLogRemark')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>
    </x-slot>

    <x-slot name="buttons">
        <div  class="py-4">

            <button wire:click.prevent="$emit('closeModal')" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Cancel</button>

            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Reject</button>
        </div>
    </x-slot>
    
</x-modal>

