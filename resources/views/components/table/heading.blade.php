@props([
    'sortable' => null,
    'direction' => null,
])

<th
    {{ $attributes->merge(['class' => 'px-6 py-3 bg-gray-50 dark:text-gray-100 dark:bg-stone-500'])->only('class') }}

>

    @unless ($sortable)
        
        <span class="text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking-wider"> {{ $slot }} </span>

    @else

        <button {{ $attributes->except('class') }} class='flex items-center space-x-1 text-left text-xs leading-4 font-medium'>

            <span>{{ $slot }}</span>

            <span>

                @if ($direction === 'asc')

                    <svg class="w-3 h-3" fill='none' stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M3 3h3v2h-3ZM3 6h6v2h-6ZM3 9h9v2h-9ZM3 12h12v2h-12Z" style="fill: hsl(180, 100%, 50%)" /></svg>
               
                @elseif ($direction === 'desc')

                    <svg class="w-3 h-3" fill='none' stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M3 3h12v2h-12ZM3 6h9v2h-9ZM3 9h6v2h-6ZM3 12h3v2h-3Z" style="fill: hsl(180, 100%, 50%)" /></svg>
                
                @else

                    <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill='none' stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18"><path d="M3 3h9v2h-9ZM3 6h3v2h-3ZM3 9h12v2h-12ZM3 12h6v2h-6Z" style="fill: hsl(180, 100%, 50%)" /></svg>
                
                @endif

            </span>
        
        </button>
    
    @endif

</th>