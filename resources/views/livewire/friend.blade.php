<div>
    <div>
        @if (Auth::user()->id !== $user->id)
            <p><button wire:click="friendRequest({{ $user->id }})"
                class="inline-flex item-center mt-3 px-4 py-2 bg-blue-500 hover:bg-blue-600 border border-blue-500">
                Добавить в друзья
            </button></p>
        @endif
    </div>

    @if (session()->has('message'))
        <div class="text-white px-2 py-2 border-0 rounded relative mt-2 bg-blue-400">
            <span class="inline-block align-middle">
                {{ session('message') }}
            </span>
        </div>
    @endif
</div>
