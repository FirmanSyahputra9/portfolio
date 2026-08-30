<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;





class Authentication extends Component
{

    #[On('login')]
    public function login($data)
    {
        dd($data);
    }
}
