<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UpdateAbout extends Component
{
    public $state = [];

    public function mount()
    {
        $this->state = Auth::user()->withoutRelations()->toArray();
    }

    public function updateAbout()
    {
        Validator::make($this->state, [
            'about' => 'max:150',
        ])->validate();

        
        Auth::user()->update(['about' => $this->state['about']]);
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.update-about');
    }
}
