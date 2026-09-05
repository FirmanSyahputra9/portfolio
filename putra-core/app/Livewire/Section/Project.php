<?php

namespace App\Livewire\Section;

use App\Models\Category;
use App\Models\ProjectData;
use App\Models\ProjectDetail;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Project extends Component
{
    use WithFileUploads;

    public $show = false;
    public $projects = [];
    public $photo;
    public $tempPhotos = [];
    public $show2 = [];

    public $addProjectTitleId;
    public $addProjectTitleEn;
    public $addProjectIntroductionId;
    public $addProjectIntroductionEn;
    public $addProjectDemo;
    public $addProjectSourceCode;
    public $addProjectStartDate;
    public $addProjectCompletedAt;

    public $technologyInputs = [];
    public $categoryInputs = [];

    protected $rules = [
        'tempPhotos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'addProjectTitleId' => 'required|string|max:255',
        'addProjectTitleEn' => 'required|string|max:255',
        'addProjectIntroductionId' => 'nullable|string',
        'addProjectIntroductionEn' => 'nullable|string',
        'addProjectDemo' => 'nullable|url|max:255',
        'addProjectSourceCode' => 'nullable|url|max:255',
        'addProjectStartDate' => 'nullable|date',
        'addProjectCompletedAt' => 'nullable|date|after_or_equal:addProjectStartDate',
    ];

    private function loadProjects()
    {
        $user = Auth::user();

        $this->projects = $user->projectData()
            ->with([
                'projectDetails:id,project_id,technology_id,category_id',
                'projectDetails.technology:id,name,slug',
                'projectDetails.category:id,name,slug',
            ])
            ->select([
                'id',
                'title_id',
                'title_en',
                'start_date',
                'completed_at',
                'introduction_id',
                'introduction_en',
                'demo',
                'source_code',
                'image',
            ])
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

        ProjectDetail::create([
            'project_id' => $this->projects[$index]['id'],
            'technology_id' => $technology->id,
            'category_id' => $category->id,
        ]);

        $this->technologyInputs[$index] = '';
        $this->categoryInputs[$index] = '';

        $this->loadProjects();
    }

    public function removeTechnology($projectIndex, $detailIndex)
    {
        $detail = $this->projects[$projectIndex]['project_details'][$detailIndex] ?? null;

        if (!$detail) {
            return;
        }

        ProjectDetail::where('id', $detail['id'])->delete();

        $this->loadProjects();
    }

    public function addProjectButton()
    {

        $this->validate();

        $project = ProjectData::create([
            'user_id' => Auth::id(),

            'title_id' => $this->addProjectTitleId,
            'title_en' => $this->addProjectTitleEn,

            'start_date' => $this->addProjectStartDate,
            'completed_at' => $this->addProjectCompletedAt,

            'introduction_id' => $this->addProjectIntroductionId,
            'introduction_en' => $this->addProjectIntroductionEn,

            'demo' => $this->addProjectDemo,
            'source_code' => $this->addProjectSourceCode,
        ]);


        $this->reset([
            'addProjectTitleId',
            'addProjectTitleEn',
            'addProjectIntroductionId',
            'addProjectIntroductionEn',
            'addProjectDemo',
            'addProjectSourceCode',
            'addProjectStartDate',
            'addProjectCompletedAt',
        ]);

        $this->loadProjects();

        $index = collect($this->projects)
            ->search(fn($item) => $item['id'] == $project->id);

        if ($index !== false) {
            $this->show2[$index] = true;
        }

        session()->flash('message', 'Proyek berhasil ditambahkan!');
    }

    public function removeProjectButton($index)
    {
        if (!isset($this->projects[$index])) {
            session()->flash('error', 'Proyek tidak ditemukan!');
            return;
        }

        $projectId = $this->projects[$index]['id'] ?? null;

        if ($projectId) {
            ProjectData::where('id', $projectId)->delete();
        }

        unset($this->projects[$index]);
        $this->projects = array_values($this->projects);

        session()->flash('message', 'Proyek berhasil dihapus!');
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

        $project = $this->projects[$index];

        $oldPhotoPath = $project['image'] ?? null;

        $path = $this->tempPhotos[$index]->store(
            'project',
            'public'
        );

        $user = User::findOrFail(Auth::id());

        $user->projectData()
            ->where('id', $project['id'])
            ->update([
                'image' => $path,
            ]);

        if ($oldPhotoPath && $oldPhotoPath !== $path) {
            Storage::disk('public')->delete($oldPhotoPath);
        }

        $this->projects[$index]['image'] = $path;

        unset($this->tempPhotos[$index]);

        session()->flash('message', 'Foto berhasil diubah!');
    }

    public function mount()
    {
        $this->loadProjects();
    }

    public function toggle()
    {
        $this->show = !$this->show;
    }

    public function toggle2($index)
    {
        $this->show2[$index] = !($this->show2[$index] ?? false);
    }

    public function saveProject()
    {
        foreach ($this->projects as $projectData) {
            if (isset($projectData['id'])) {
                ProjectData::where('id', $projectData['id'])
                    ->where('user_id', Auth::id())
                    ->update([
                        'title_id' => $projectData['title_id'],
                        'title_en' => $projectData['title_en'],
                        'start_date' => $projectData['start_date'],
                        'completed_at' => $projectData['completed_at'],
                        'introduction_id' => $projectData['introduction_id'],
                        'introduction_en' => $projectData['introduction_en'],
                        'demo' => $projectData['demo'],
                        'source_code' => $projectData['source_code'],
                    ]);
            }
        }

        session()->flash('message', 'Proyek berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.section.project', [
            'rules' => $this->rules
        ]);
    }
}
