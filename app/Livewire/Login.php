<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';

    public string $password = '';

    protected array $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function render()
    {
        // return view('livewire.agent.auth.login')->layout('layouts.guest_agent_app');
        return view('livewire.login')->layout('layouts.guest_agent_app');
    }

    public function login()
    {

        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {
            // $this->loadPermissions(\auth('agent')->user()->role_id);
            return redirect()->route('employees');
        }
        $this->addError('invalid-credentials', 'Incorrect Email or password');
    }
}
