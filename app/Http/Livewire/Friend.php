<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Friend extends Component
{
    public $user;

    public function mount($user) 
    {
        $this->user = $user;
    }

    public function friendRequest($id)
    {
        if (Auth::user()->id === $id) return null;

        # Если уже отправлен запрос в друзья
        if (Auth::user()->hasFriendRequestPending($this->user)
          || $this->user->hasFriendRequestPending(Auth::user())) 
        {
            session()->flash('message', 'Пользователю уже отправлен запрос в друзья.');
        } else {
            Auth::user()->addFriend($id);
        }        
    }

    public function cancelFriendRequest($id)
    {
        Auth::user()->cancelFriend($id);
    }

    public function render()
    {
        return view('livewire.friend');
    }
}
