<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExtendedProfile extends Component
{

    public $state = [];

    public function mount()
    {
        $this->state = Auth::user()->withoutRelations()->toArray();

        if (Auth::user()->birthday) {
            $this->birthdayArr = explode("-", Auth::user()->birthday);
            $this->state['bday'] = $this->birthdayArr[2];
            $this->state['bmonth'] = $this->birthdayArr[1];
            $this->state['byear'] = $this->birthdayArr[0];
        } else {
            $this->state['bday'] = '';
            $this->state['bmonth'] = '';
            $this->state['byear'] = '';
        }
    }

    public function setStrBirthday()
    {
        if (($this->state['bday'] && $this->state['bmonth']
            && $this->state['byear']) != '')
        {
            return "{$this->state['byear']}-{$this->state['bmonth']}-{$this->state['bday']}";
        }
    }

    public function updateExtendedProfile()
    {
        Validator::make($this->state, [
            'byear' => ['digits:4', 'integer'],
            'career' => ['string', 'max:20'],
        ])->validate();

        Auth::user()->update([
            'birthday' => $this->setStrBirthday(),
            'career' => $this->state["career"],
        ]);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.extended-profile');
    }
}
