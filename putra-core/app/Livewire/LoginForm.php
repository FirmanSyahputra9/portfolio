<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\AuthenticationService;


class LoginForm extends Component
{
    public $logemail;
    public $logpass;

    public function login(AuthenticationService $auth)
    {
        $result = $auth->login($this->logemail, $this->logpass);

        if (! $result['success']) {
            $this->addError('logemail', $result['message']);
            return;
        }
        
        request()->session()->regenerate();
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
