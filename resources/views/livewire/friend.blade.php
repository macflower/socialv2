<div>
    @if (Auth::user()->hasFriendRequestPending($user))

    @include('livewire.parts.button', ['text' => 'Отписаться',
                                       'method' => "cancelFriendRequest($user->id)"])

    @else
        <div>
            @if (Auth::user()->id !== $user->id)

                @include('livewire.parts.button', ['text' => 'Добавить в друзья',
                                                   'method' => "friendRequest($user->id)"])

            @endif
        </div>

        @if (session()->has('message'))
            <div class="text-white px-2 py-2 border-0 rounded relative mt-2 bg-blue-400">
                <span class="inline-block align-middle">
                    {{ session('message') }}
                </span>
            </div>
        @endif
    @endif
</div>
