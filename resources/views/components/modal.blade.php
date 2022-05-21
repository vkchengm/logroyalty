@props(['formAction' => false])

<div>
    @if($formAction)
        <form wire:submit.prevent="{{ $formAction }}">
    @endif
            <div class="bg-white dark:bg-stone-800 p-4 sm:px-6 sm:py-4 border-b border-gray-150">
                @if(isset($title))
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200">
                        {{ $title }}
                    </h3>
                @endif
            </div>
            <div class="bg-white dark:bg-stone-600 px-4 sm:p-6">
                <div class="space-y-6 ">
                    {{ $content }}
                </div>
            </div>

            {{-- <div class="bg-gray-200 hover:bg-gray-300 text-black font-bold py-2 px-4 rounded"> --}}
            <div class="bg-white dark:bg-stone-700 px-4 pb-5 sm:px-4 sm:flex">
            
                {{ $buttons }}
            </div>
    @if($formAction)
        </form>
    @endif
</div>