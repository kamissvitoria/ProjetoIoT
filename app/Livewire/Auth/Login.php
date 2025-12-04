<?php

namespace App\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    protected $messages = [
        'email.required' => 'Email obrigatório',
        'email.required'=>  'formato de email incorreta'
    ];

    public function render()
    {
        return view('livewire.auth.login');
    }
}
