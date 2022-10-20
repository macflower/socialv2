<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Actions\Fortify\PasswordValidationRules;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    use PasswordValidationRules;

    public $currentStep = 0;
    public $first_name, $last_name, $gender, $terms;
    public $username, $email, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.register');
    }

    public function next()
    {
        $this->validate([
            'first_name' => 'required|string|min:4|max:50',
            'last_name' => 'required|string|min:4|max:50',
            'gender' => 'required|string|regex:/^[mf]$/',
        ]);

        $this->currentStep++;
    }

    public function submitForm()
    {
        $this->validate([
            'username' => 'required|min:4|max:50|unique:users',
            'email' => 'required|email|unique:users',
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ]);

        User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        # Авторизация после регистрации
        if (Auth::attempt(['username' => $this->username,
                            'password' => $this->password]))
        {
            return redirect()->route('dashboard');
        }
    }

    public function back()
    {
        $this->currentStep--;
    }
}
