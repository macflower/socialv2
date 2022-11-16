<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public function render($user)
    {
        return view('livewire.pages.profile', [
            'user' => User::where('id', $user->id)->firstOrFail(),
        ]);
    }
}
