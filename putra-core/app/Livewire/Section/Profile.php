<?php

namespace App\Livewire\Section;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use \Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Profile extends Component
{
    use WithFileUploads;

    public $photo;
    public $tempPhoto;


    protected $rules = [
        'tempPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
    ];

    protected $messages = [
        'tempPhoto.required' => 'Silakan pilih foto',
        'tempPhoto.image' => 'File harus berupa gambar',
        'tempPhoto.mimes' => 'Format harus jpeg, png, jpg, gif, svg, atau webp',
        'tempPhoto.max' => 'Ukuran maksimal 2MB',
    ];

    public function mount()
    {
        $user = User::with('heroData')->find(Auth::id());
        $this->photo = $user->heroData->image ?? null;
    }

    public function updatedTempPhoto()
    {
        $this->validate();
    }

    public function confirmUpdatePhoto()
    {
        $this->validate();

        $user = User::with('heroData')->findOrFail(Auth::id());

        $oldPhotoPath = $user->heroData->image ?? null;


        $path = $this->tempPhoto->store('profile', 'public');

        $user->heroData()->update([
            'image' => $path,
        ]);

        if ($oldPhotoPath && $oldPhotoPath !== $path) {
            Storage::disk('public')->delete($oldPhotoPath);
        }


        $this->photo = $path;
        $this->tempPhoto = null;

        session()->flash('message', 'Foto profil berhasil diperbarui');
    }



    public function render()
    {
        return view('livewire.section.profile');
    }
}
