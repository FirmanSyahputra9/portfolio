<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\PortfolioService;

class Portofolio extends Component
{
    public $hero = [];
    public $projects = [];
    public $featuredProject = [];
    public $skills = [];
    public $technologies = [];
    public $about = [];
    public $experiences = [];
    public $contacts = [];
    public $certificates = [];


    

    public function mount(PortfolioService $portfolio)
    {
        $data = $portfolio->getPortfolio();
        $this->hero = $data['hero'] ?? [];
        $this->featuredProject = $data['featuredProject'] ?? [];
        $this->projects = $data['projects'] ?? [];
        $this->skills = $data['skills'] ?? [];
        $this->technologies = $data['technologies'] ?? [];
        $this->about = $data['about'] ?? [];
        $this->experiences = $data['experiences'] ?? [];
        $this->contacts = $data['contacts'] ?? [];
        $this->certificates = $data['certificates'] ?? [];
        // dd($this->certificates);

        // dd($this->contact);

    }

    public function render()
    {
        return view('livewire.portofolio');
    }
}
