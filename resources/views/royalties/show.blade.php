<span>
    <div class="flex">

        <div class="rounded-full h-2 w-full justify-end bg-green">

            <form class="inline-block" action="{{ route('royalties.destroy', $royalties->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
            </form>
            {{-- <form class="inline-block" action="{{ route('users.destroyexternal', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
            </form> --}}
        </div>
    </div>
</span>