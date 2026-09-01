<?php

namespace App\Livewire\Section;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class About extends Component
{
    public $about_description_id;
    public $about_description_en;
    public $show = false;

    protected $rules = [
        'about_description_id' => 'nullable|string|max:5000',
        'about_description_en' => 'nullable|string|max:5000',
    ];

    public function toggle()
    {
        $this->show = !$this->show;
    }

    public function mount()
    {
        $user = Auth::user();
        if ($user->aboutData) {
            $this->about_description_id = $user->aboutData->about_description_id;
            $this->about_description_en = $user->aboutData->about_description_en;
        }
    }

    public function saveAbout()
    {
        $this->validate();

        $user = Auth::user();

        // Update atau create AboutData
        $user->aboutData()->updateOrCreate(
            ['user_id' => $user->id], // Condition
            [
                'about_description_id' => $this->about_description_id,
                'about_description_en' => $this->about_description_en,
            ]
        );

        session()->flash('message', 'About section berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.section.about', [
            'rules' => $this->rules,
        ]);
    }
}
