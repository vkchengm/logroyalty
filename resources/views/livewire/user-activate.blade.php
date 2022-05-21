<x-modal formAction="update">
    <x-slot name="title">
        <div class="pt-8">
        Activating user and assigning a Licensee to user: {{ $user->name }}
        </div>
    </x-slot>

    <x-slot name="content">
        <div>
            Licensee Name:
            <select id="licensee_id" name="licensee_id" class="block mt-1 w-full" type="text" wire:model.defer="user.licensee_id" />
                <option value="">Select Licensee</option>
                @foreach ($licensees as $licensee)
                    <option value={{ $licensee->id }}>
                        {{ $licensee->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- <div>
            Notes:
            <input id="description" class="block mt-1 w-full" type="text" wire:model.defer="permitLogRemark" />
            
            @error('permitLogRemarkn')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror
        </div> --}}
    </x-slot>

    <x-slot name="buttons">
        <div  class="py-4">

            <button wire:click.prevent="$emit('closeModal')" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Cancel</button>

            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Activate</button>
        </div>
    </x-slot>
    
</x-modal>

