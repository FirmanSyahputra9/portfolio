<?php

namespace App\Livewire\Section;

use App\Models\ContactData;
use App\Models\ContactDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Contact extends Component
{
    public $show = false;
    public $show2 = [];

    // Contact main data
    public $contact_title_id;
    public $contact_title_en;
    public $contact_description_id;
    public $contact_description_en;
    public $contactDetails = [];

    // Add new contact detail
    public $addContactPlatform;
    public $addContactName;
    public $addContactIcon;
    public $addContactUrl;

    protected $rules = [
        'contact_title_id' => 'required|string|max:255',
        'contact_title_en' => 'required|string|max:255',
        'contact_description_id' => 'nullable|string|max:5000',
        'contact_description_en' => 'nullable|string|max:5000',
        'addContactPlatform' => 'required|string|max:255',
        'addContactName' => 'required|string|max:255',
        'addContactIcon' => 'required|string|max:255',
        'addContactUrl' => 'required|url|max:255',
    ];

    private function loadContact()
    {
        $user = Auth::user();

        $contact = $user->contactData()
            ->with(['contactDetails'])
            ->first();

        if ($contact) {
            $this->contact_title_id = $contact->contact_title_id;
            $this->contact_title_en = $contact->contact_title_en;
            $this->contact_description_id = $contact->contact_description_id;
            $this->contact_description_en = $contact->contact_description_en;
            $this->contactDetails = $contact->contactDetails->toArray();
        } else {
            $this->contact_title_id = '';
            $this->contact_title_en = '';
            $this->contact_description_id = '';
            $this->contact_description_en = '';
            $this->contactDetails = [];
        }
    }

    public function addContactDetail()
    {
        $this->validate([
            'addContactPlatform' => 'required|string|max:255',
            'addContactName' => 'required|string|max:255',
            'addContactIcon' => 'required|string|max:255',
            'addContactUrl' => 'required|url|max:255',
        ]);

        // Get or create contact data
        $contact = Auth::user()->contactData()->first();

        if (!$contact) {
            $contact = ContactData::create([
                'user_id' => Auth::id(),
                'contact_title_id' => $this->contact_title_id ?: 'Kontak',
                'contact_title_en' => $this->contact_title_en ?: 'Contact',
                'contact_description_id' => $this->contact_description_id,
                'contact_description_en' => $this->contact_description_en,
            ]);
        }

        // Create contact detail
        ContactDetail::create([
            'contact_id' => $contact->id,
            'platform' => $this->addContactPlatform,
            'name' => $this->addContactName,
            'icon' => $this->addContactIcon,
            'url' => $this->addContactUrl,
        ]);

        // Reset form
        $this->reset([
            'addContactPlatform',
            'addContactName',
            'addContactIcon',
            'addContactUrl',
        ]);

        $this->loadContact();
        session()->flash('message', 'Platform kontak berhasil ditambahkan!');
    }

    public function removeContactDetail($index)
    {
        if (!isset($this->contactDetails[$index])) {
            session()->flash('error', 'Platform kontak tidak ditemukan!');
            return;
        }

        $detailId = $this->contactDetails[$index]['id'] ?? null;

        if ($detailId) {
            ContactDetail::where('id', $detailId)->delete();
        }

        $this->loadContact();
        session()->flash('message', 'Platform kontak berhasil dihapus!');
    }

    public function saveContact()
    {
        $this->validate([
            'contact_title_id' => 'required|string|max:255',
            'contact_title_en' => 'required|string|max:255',
            'contact_description_id' => 'nullable|string|max:5000',
            'contact_description_en' => 'nullable|string|max:5000',
        ]);

        $user = Auth::user();

        // Update or create contact data
        $contact = $user->contactData()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'contact_title_id' => $this->contact_title_id,
                'contact_title_en' => $this->contact_title_en,
                'contact_description_id' => $this->contact_description_id,
                'contact_description_en' => $this->contact_description_en,
            ]
        );

        $this->loadContact();
        session()->flash('message', 'Contact section berhasil disimpan!');
    }

    public function mount()
    {
        $this->loadContact();
    }

    public function toggle()
    {
        $this->show = !$this->show;
    }

    public function toggle2($index)
    {
        $this->show2[$index] = !($this->show2[$index] ?? false);
    }

    public function render()
    {
        return view('livewire.section.contact', [
            'rules' => $this->rules
        ]);
    }
}
