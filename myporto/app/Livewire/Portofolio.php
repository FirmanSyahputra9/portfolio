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
    public $educations = [];

    public $showAllCertificates = false;
    public $showAllEducations = false;
    public $showAllExperiences = false;


    public function mount(PortfolioService $portfolio)
    {
        app()->setLocale(session('locale', 'en'));
        $this->loadPortfolio($portfolio);
    }

    private function loadPortfolio(PortfolioService $portfolio)
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
        $this->educations = $data['educations'] ?? [];
    }

    public function toggleCertificates()
    {
        $this->showAllCertificates = !$this->showAllCertificates;
    }


    public function toggleEducations()
    {
        $this->showAllEducations = !$this->showAllEducations;
    }

    public function toggleExperiences()
    {
        $this->showAllExperiences = !$this->showAllExperiences;
    }

    public function changeLanguage($locale)
    {
        if (! in_array($locale, ['id', 'en'])) {
            return;
        }

        session(['locale' => $locale]);

        app()->setLocale($locale);
        $this->loadPortfolio(app(PortfolioService::class));
    }

    public function render()
    {
        return view('livewire.portofolio');
    }
}
