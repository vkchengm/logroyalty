<x-modal formAction="update">
    <x-slot name="title">
        <div class="pt-8">
        Payment for TDP{{ $permit->id }} {{ $permit->license_no }} 
        </div>
    </x-slot>

    <x-slot name="content">
        {{-- <div>
            Name:
            <select id="kppm_id" name="kppm_id" class="block mt-1 w-full" type="text" wire:model.defer="permit.kppm_id" />
                <option value="">Select KPPM</option>
                @foreach ($kppms as $kppm)
                    <option value={{ $kppm->id }}>
                        {{ $kppm->name }}
                    </option>
                @endforeach
            </select>
        </div> --}}

        <div>
            Receipt No.:
            <input id="receipt_no" class="block mt-1 w-full" type="text" wire:model.defer="permit.receipt_no" />
            
            @error('permit.receipt_no')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            Payment Date:
            <input id="payment_date" class="block mt-1 w-full" type="date" wire:model.defer="permit.payment_date" />
            
            @error('permit.payment_date')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            Valid From:
            <input id="valid_from" class="block mt-1 w-full" type="date" wire:model.defer="permit.valid_from" />
            
            @error('permit.valid_from')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            Valid To:
            <input id="valid_to" class="block mt-1 w-full" type="date" wire:model.defer="permit.valid_to" />
            
            @error('permit.valid_to')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div>

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
            <button wire:click.prevent="$emit('closeModal')" class="px-4">Cancel</button>

            <button type="submit">Confirm</button>
        </div>
    </x-slot>
    
</x-modal>

