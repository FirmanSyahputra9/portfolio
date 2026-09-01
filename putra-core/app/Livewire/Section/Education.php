<?php

namespace App\Livewire\Section;

use App\Models\Category;
use App\Models\EducationData;
use App\Models\EducationDetail;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Education extends Component
{
    use WithFileUploads;

    public $show = false;
    public $educations = [];
    public $photo;
    public $tempPhotos = [];
    public $show2 = [];

    public $addEducationInstitutionId;
    public $addEducationInstitutionEn;
    public $addEducationDegree;
    public $addEducationFieldOfStudyId;
    public $addEducationFieldOfStudyEn;
    public $addEducationFinalGrade;
    public $addEducationLocation;
    public $addEducationStartDate;
    public $addEducationEndDate;

    public $technologyInputs = [];
    public $categoryInputs = [];

    protected $rules = [
        'tempPhotos.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'addEducationInstitutionId' => 'required|string|max:255',
        'addEducationInstitutionEn' => 'required|string|max:255',
        'addEducationDegree' => 'nullable|string|max:255',
        'addEducationFieldOfStudyId' => 'nullable|string|max:255',
        'addEducationFieldOfStudyEn' => 'nullable|string|max:255',
        'addEducationFinalGrade' => 'nullable|string|max:255',
        'addEducationLocation' => 'nullable|string|max:255',
        'addEducationStartDate' => 'nullable|date',
        'addEducationEndDate' => 'nullable|date|after:addEducationStartDate',
    ];

    private function loadEducations()
    {
        $user = Auth::user();

        $this->educations = $user->educationData()
            ->with([
                'educationDetails:id,education_id,technology_id,category_id',
                'educationDetails.technology:id,name,slug',
                'educationDetails.category:id,name,slug',
            ])
            ->select([
                'id',
                'institution_id',
                'institution_en',
                'degree',
                'field_of_study_id',
                'field_of_study_en',
                'final_grade',
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

        // Cari atau buat Technology
        $technology = Technology::firstOrCreate(
            ['name' => $technologyName],
            ['slug' => Str::slug($technologyName)]
        );

        // Cari atau buat Category
        $category = Category::firstOrCreate(
            ['name' => $categoryName],
            ['slug' => Str::slug($categoryName)]
        );

        // Buat relasi education dengan technology + category
        EducationDetail::create([
            'education_id' => $this->educations[$index]['id'],
            'technology_id' => $technology->id,
            'category_id' => $category->id,
        ]);

        // Kosongkan input
        $this->technologyInputs[$index] = '';
        $this->categoryInputs[$index] = '';

        // Reload data
        $this->loadEducations();
    }

    public function removeTechnology($educationIndex, $detailIndex)
    {
        $detail = $this->educations[$educationIndex]['education_details'][$detailIndex] ?? null;

        if (!$detail) {
            return;
        }

        EducationDetail::where('id', $detail['id'])->delete();

        $this->loadEducations();
    }

    public function addEducationButton()
    {
        $this->validate();
    
        $education = EducationData::create([
            'user_id' => Auth::id(),
            'institution_id' => $this->addEducationInstitutionId,
            'institution_en' => $this->addEducationInstitutionEn,
            'degree' => $this->addEducationDegree,
        ]);

        $this->reset([
            'addEducationInstitutionId',
            'addEducationInstitutionEn',
            'addEducationDegree',
        ]);

        $this->loadEducations();

        $index = collect($this->educations)
            ->search(fn($item) => $item['id'] == $education->id);

        if ($index !== false) {
            $this->show2[$index] = true;
        }

        session()->flash('message', 'Pendidikan berhasil ditambahkan!');
    }

    public function removeEducationButton($index)
    {
        if (!isset($this->educations[$index])) {
            session()->flash('error', 'Pendidikan tidak ditemukan!');
            return;
        }

        $educationId = $this->educations[$index]['id'] ?? null;

        if ($educationId) {
            EducationData::where('id', $educationId)->delete();
        }

        unset($this->educations[$index]);
        $this->educations = array_values($this->educations);

        session()->flash('message', 'Pendidikan berhasil dihapus!');
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

        $education = $this->educations[$index];

        $oldPhotoPath = $education['image'] ?? null;

        $path = $this->tempPhotos[$index]->store(
            'education',
            'public'
        );

        $user = User::findOrFail(Auth::id());

        $user->educationData()
            ->where('id', $education['id'])
            ->update([
                'image' => $path,
            ]);

        if ($oldPhotoPath && $oldPhotoPath !== $path) {
            Storage::disk('public')->delete($oldPhotoPath);
        }

        $this->educations[$index]['image'] = $path;

        unset($this->tempPhotos[$index]);

        session()->flash('message', 'Foto pendidikan berhasil diubah!');
    }

    public function mount()
    {
        $this->loadEducations();
    }

    public function updatedEducations($value, $key)
    {
        // Optional: Auto-update end_date if needed
        if (str_ends_with($key, '.start_date')) {
            $index = explode('.', $key)[0];
            // You can add logic here if needed
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

    public function saveEducation()
    {
        foreach ($this->educations as $educationData) {
            if (isset($educationData['id'])) {
                EducationData::where('id', $educationData['id'])
                    ->where('user_id', Auth::id())
                    ->update([
                        'institution_id' => $educationData['institution_id'],
                        'institution_en' => $educationData['institution_en'],
                        'degree' => $educationData['degree'],
                        'field_of_study_id' => $educationData['field_of_study_id'],
                        'field_of_study_en' => $educationData['field_of_study_en'],
                        'final_grade' => $educationData['final_grade'],
                        'description_id' => $educationData['description_id'],
                        'description_en' => $educationData['description_en'],
                        'location' => $educationData['location'],
                        'start_date' => $educationData['start_date'],
                        'end_date' => $educationData['end_date'] ?? null,
                    ]);
            }
        }

        session()->flash('message', 'Pendidikan berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.section.education', [
            'rules' => $this->rules
        ]);
    }
}
