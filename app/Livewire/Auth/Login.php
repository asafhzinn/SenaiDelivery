<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remmber = false;

    public function login(){
    $acredentials = $this->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ], [
        'email.required' => 'O email é obrigatorio',
        'email.email' => 'formato de senha incorreto',
        'password.required' => 'Senha obrigatoria'
    ]);

    if(!Auth::attempt($acredentials, $this->remmber)){
        session()->flash('error', 'Email ou senha incorretos');

    }

    $user = Auth::user();

    if(!$user->isAdmin()){
       Auth::logout();

       request()->session()->invalidate();
       request()->session()->regenerateToken();

       session()->flash('error', 'não autorizado.');
    }

    request()->session()->regenerate();

    return redirect()->route('dashboard');

}
    public function render()
    {
        return view('livewire.auth.login');
    }
}