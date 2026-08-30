<?php

namespace App\Livewire;

use App\Services\ApiService;
use Livewire\Component;

class PortfolioData extends Component
{
    public $user;


    public function mount(ApiService $api)
    {
        $this->user = $api->get('/portfolio')->json();
    }

    public function render()
    {

        return view('livewire.portfolio-data');
    }
}
