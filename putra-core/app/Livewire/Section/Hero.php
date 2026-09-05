<?php

namespace App\Livewire\Section;

use App\Models\HeroButton;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Hero extends Component
{

    public $name_id;
    public $name_en;
    public $role_id;
    public $role_en;
    public $summary_id;
    public $summary_en;
    public $role_description_id;
    public $role_description_en;
    public $show = false;

    protected $rules = [
        'name_id' => 'required|string|max:50',
        'name_en' => 'required|string|max:50',
        'role_id' => 'required|string|max:250',
        'role_en' => 'required|string|max:250',
        'summary_id' => 'required|string|max:255',
        'summary_en' => 'required|string|max:255',
        'role_description_id' => 'required:string|max:5000',
        'role_description_en' => 'required:string|max:5000',
    ];

    public function toggle()
    {
        $this->show = !$this->show;
    }


    public function mount()
    {

        $user = Auth::user();
        if ($user->heroData) {
            $this->name_id = $user->heroData->name_id;
            $this->name_en = $user->heroData->name_en;
            $this->role_id = $user->heroData->role_id;
            $this->role_en = $user->heroData->role_en;
            $this->summary_id = $user->heroData->summary_id;
            $this->summary_en = $user->heroData->summary_en;
            $this->role_description_id = $user->heroData->role_description_id;
            $this->role_description_en = $user->heroData->role_description_en;
        }
    }

    public function saveHero()
    {
        $this->validate();
        $user = Auth::user();

        $heroData = $user->heroData()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'name_id' => $this->name_id,
                'name_en' => $this->name_en,
                'role_id' => $this->role_id,
                'role_en' => $this->role_en,
                'summary_id' => $this->summary_id,
                'summary_en' => $this->summary_en,
                'role_description_id' => $this->role_description_id,
                'role_description_en' => $this->role_description_en,
            ]
        );

        session()->flash('message', 'Hero section berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.section.hero', [
            'rules' => $this->rules,
        ]);
    }
}
