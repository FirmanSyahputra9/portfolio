<?php

namespace App\Livewire\Section;

use App\Models\Category;
use App\Models\ExperienceData;
use App\Models\ExperienceDetail;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Experience extends Component
{
    use WithFileUploads;

    public $show = false;
    public $experiences = [];
    public $photo;
    public $tempPhotos = [];
    public $show2 = [];

    public $addExperiencePosition;
    public $addExperienceCompany;
    public $addExperienceLocation;
    public $addExperienceStartDate;
    public $addExperienceEndDate;

    public $technologyInputs = [];
    public $categoryInputs = [];

    protected $rules = [
        'tempPhotos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'addExperiencePosition' => 'required|string|max:255',
        'addExperienceCompany' => 'required|string|max:255',
        'addExperienceLocation' => 'required|string|max:255',
        'addExperienceStartDate' => 'nullable|date',
        'addExperienceEndDate' => 'nullable|date|after:addExperienceStartDate',
    ];

    private function loadExperiences()
    {
        $user = Auth::user();

        $this->experiences = $user->experienceData()
            ->with([
                'experienceDetails:id,experience_id,technology_id,category_id',
                'experienceDetails.technology:id,name,slug',
                'experienceDetails.category:id,name,slug',
            ])
            ->select([
                'id',
                'position',
                'company',
                'description_id',
                'description_en',
                'location',
                'start_date',
                'end_date',
                'image',
            ])
            ->orderBy('start_date', 'desc')
            ->get()
            ->toArray();
    }

    public function getTechnologies($index)
    {
        $search = $this->technologyInputs[$index] ?? '';

        return Technology::where('name', 'like', "%{$search}%")
            ->limit(5)
            ->get();
    }

    public function getCategories($index)
    {
        $search = $this->categoryInputs[$index] ?? '';

        return Category::where('name', 'like', "%{$search}%")
            ->limit(5)
            ->get();
    }

    public function addTechnology($index)
    {
        $technologyName = trim($this->technologyInputs[$index] ?? '');
        $categoryName = trim($this->categoryInputs[$index] ?? '');

        if ($technologyName === '' || $categoryName === '') {
            return;
        }

        $technology = Technology::firstOrCreate(
            ['name' => $technologyName],
            ['slug' => Str::slug($technologyName)]
        );

        $category = Category::firstOrCreate(
            ['name' => $categoryName],
            ['slug' => Str::slug($categoryName)]
        );

        ExperienceDetail::create([
            'experience_id' => $this->experiences[$index]['id'],
            'technology_id' => $technology->id,
            'category_id' => $category->id,
        ]);

        $this->technologyInputs[$index] = '';
        $this->categoryInputs[$index] = '';

        $this->loadExperiences();
    }

    public function removeTechnology($experienceIndex, $detailIndex)
    {
        $detail = $this->experiences[$experienceIndex]['experience_details'][$detailIndex] ?? null;

        if (!$detail) {
            return;
        }

        ExperienceDetail::where('id', $detail['id'])->delete();

        $this->loadExperiences();
    }

    public function addExperienceButton()
    {
        $this->validate();

        $experience = ExperienceData::create([
            'user_id' => Auth::id(),
            'position' => $this->addExperiencePosition,
            'company' => $this->addExperienceCompany,
            'location' => $this->addExperienceLocation,
            'start_date' => $this->addExperienceStartDate,
            'end_date' => $this->addExperienceEndDate,
            'description_id' => '',
            'description_en' => '',
        ]);

        $this->reset([
            'addExperiencePosition',
            'addExperienceCompany',
            'addExperienceLocation',
            'addExperienceStartDate',
            'addExperienceEndDate',
        ]);

        $this->loadExperiences();

        $index = collect($this->experiences)
            ->search(fn($item) => $item['id'] == $experience->id);

        if ($index !== false) {
            $this->show2[$index] = true;
        }

        session()->flash('message', 'Pengalaman berhasil ditambahkan!');
    }

    public function removeExperienceButton($index)
    {
        if (!isset($this->experiences[$index])) {
            session()->flash('error', 'Pengalaman tidak ditemukan!');
            return;
        }

        $experienceId = $this->experiences[$index]['id'] ?? null;

        if ($experienceId) {
            ExperienceData::where('id', $experienceId)->delete();
        }

        unset($this->experiences[$index]);
        $this->experiences = array_values($this->experiences);

        session()->flash('message', 'Pengalaman berhasil dihapus!');
    }

    public function updatedTempPhoto($value, $key)
    {
        $this->validateOnly("tempPhotos.$key");
    }

    public function confirmUpdatePhoto($index)
    {
        $this->validateOnly("tempPhotos.$index");

        if (!isset($this->tempPhotos[$index])) {
            return;
        }

        $experience = $this->experiences[$index];

        $oldPhotoPath = $experience['image'] ?? null;

        $path = $this->tempPhotos[$index]->store(
            'experience',
            'public'
        );

        $user = User::findOrFail(Auth::id());

        $user->experienceData()
            ->where('id', $experience['id'])
            ->update([
                'image' => $path,
            ]);

        if ($oldPhotoPath && $oldPhotoPath !== $path) {
            Storage::disk('public')->delete($oldPhotoPath);
        }

        $this->experiences[$index]['image'] = $path;

        unset($this->tempPhotos[$index]);

        session()->flash('message', 'Foto pengalaman berhasil diperbarui');
    }

    public function mount()
    {
        $this->loadExperiences();
    }

    public function updatedExperiences($value, $key)
    {

        if (str_ends_with($key, '.start_date')) {
            $index = explode('.', $key)[0];
   
        }
    }

    public function toggle()
    {
        $this->show = !$this->show;
    }

    public function toggle2($index)
    {
        $this->show2[$index] = !($this->show2[$index] ?? false);
    }

    public function saveExperience()
    {
        foreach ($this->experiences as $experienceData) {
            if (isset($experienceData['id'])) {
                ExperienceData::where('id', $experienceData['id'])
                    ->where('user_id', Auth::id())
                    ->update([
                        'position' => $experienceData['position'],
                        'company' => $experienceData['company'],
                        'description_id' => $experienceData['description_id'],
                        'description_en' => $experienceData['description_en'],
                        'location' => $experienceData['location'],
                        'start_date' => $experienceData['start_date'],
                        'end_date' => $experienceData['end_date'] ?? null,
                    ]);
            }
        }

        session()->flash('message', 'Pengalaman berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.section.experience', [
            'rules' => $this->rules
        ]);
    }
}
