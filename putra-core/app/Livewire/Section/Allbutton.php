<?php

namespace App\Livewire\Section;

use App\Models\HeroButton;
use Livewire\Component;

class Allbutton extends Component
{
    public $heroButtons = [];
    public $btnAddId, $btnAddEn, $btnAddTarget;
    public $btnAddAction = 'link';
    public $show = false;
    
    protected $rules = [
        'btnAddId' => 'required|string|max:255',
        'btnAddEn' => 'required|string|max:255',
        'btnAddTarget' => 'required|string|max:255',
        'btnAddAction' => 'required|in:link,download',
    ];

    public function toggle()
    {
        $this->show = !$this->show;
    }

    public function mount()
    {
        $buttons = HeroButton::select(
            'id',
            'label_id',
            'label_en',
            'url',
            'action'
        )->get();


        $this->heroButtons = $buttons->toArray();
    }



    public function saveHeroButton()
    {

        foreach ($this->heroButtons as $buttonData) {
            if (isset($buttonData['id'])) {
                HeroButton::where('id', $buttonData['id'])->update([
                    'label_id' => $buttonData['label_id'],
                    'label_en' => $buttonData['label_en'],
                    'url' => $buttonData['url'],
                    'action' => $buttonData['action'],

                ]);
            }
        }

        session()->flash('message', 'Button berhasil disimpan!');
    }


    public function removeHeroButton($index)
    {
        if (!isset($this->heroButtons[$index])) {
            session()->flash('error', 'Tombol tidak ditemukan!');
            return;
        }

        $buttonId = $this->heroButtons[$index]['id'] ?? null;

        if ($buttonId) {
            HeroButton::where('id', $buttonId)->delete();
        }

        unset($this->heroButtons[$index]);

        $this->heroButtons = array_values($this->heroButtons);

        session()->flash('message', 'Tombol berhasil dihapus!');
    }

    public function addHeroButton()
    {
        $this->validate();

        $newButton = HeroButton::create([
            'label_id' => $this->btnAddId,
            'label_en' => $this->btnAddEn,
            'url' => $this->btnAddTarget,
            'action' => $this->btnAddAction,
        ]);

        $this->heroButtons[] = [
            'id' => $newButton->id,
            'label_id' => $this->btnAddId,
            'label_en' => $this->btnAddEn,
            'url' => $this->btnAddTarget,
            'action' => $this->btnAddAction,
        ];

        $this->reset(['btnAddId', 'btnAddEn', 'btnAddTarget', 'btnAddAction']);

        session()->flash('message', 'Tombol berhasil ditambahkan!');
    }


    public function render()
    {
        return view('livewire.section.allbutton');
    }
}
