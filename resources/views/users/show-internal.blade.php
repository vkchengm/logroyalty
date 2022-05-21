
<span>
    <div class="flex">
        @foreach ($user->roles as $role)
        <div class="py-1 px-3 text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                {{ $role->title }}
        </div>
        @endforeach

        <div class="px-2">
        </div>

        <div class="rounded-full h-2 w-full justify-end bg-green">
            {{-- <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a> --}}
            {{-- <a href="{{ route('users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>         --}}
            <form class="inline-block" action="{{ route('users.destroyinternal', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
            </form>
        </div>
    </div>
</span>


{{-- <span>
    <div class="rounded-tl-lg rounded-tr-lg p-2 flex">
        @foreach ($user->roles as $role)
        <span class="py-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                {{ $role->title }}
        </span>
        @endforeach
        
        <h5 class="uppercase flex-1 text-center"></h5>
        <div class="rounded-full h-3 w-3 circle bg-green">
            <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
            <a href="{{ route('users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>        
            <form class="inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
            </form>
        </div>
    </div>
</span> --}}