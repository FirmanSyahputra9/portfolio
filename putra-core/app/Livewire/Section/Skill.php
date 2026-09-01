<?php

namespace App\Livewire\Section;

use App\Models\Category;
use App\Models\Technology;
use Livewire\Component;
use Illuminate\Support\Str;

class Skill extends Component
{
    // Toggle states
    public $show = false;
    public $showTechnologyForm = false;
    public $showCategoryForm = false;

    // Technology properties
    public $technologies = [];
    public $editTechnologyId = null;
    public $editTechnologyName = '';
    public $editTechnologyIcon = '';

    // Category properties
    public $categories = [];
    public $editCategoryId = null;
    public $editCategoryName = '';

    // Add new technology
    public $newTechnologyName = '';
    public $newTechnologyIcon = '';

    // Add new category
    public $newCategoryName = '';

    protected $rules = [
        'newTechnologyName' => 'required|string|max:255|unique:technologies,name',
        'newTechnologyIcon' => 'nullable|string|max:255',
        'newCategoryName' => 'required|string|max:255|unique:categories,name',
        'editTechnologyName' => 'required|string|max:255',
        'editTechnologyIcon' => 'nullable|string|max:255',
        'editCategoryName' => 'required|string|max:255',
    ];

    private function loadData()
    {
        $this->technologies = Technology::orderBy('name')
            ->select('id', 'name', 'slug', 'icon')
            ->get()
            ->toArray();

        $this->categories = Category::orderBy('name')
            ->select('id', 'name', 'slug')
            ->get()
            ->toArray();
    }

    // ========== TECHNOLOGY CRUD ==========

    public function addTechnology()
    {
        $this->validate([
            'newTechnologyName' => 'required|string|max:255|unique:technologies,name',
            'newTechnologyIcon' => 'nullable|string|max:255',
        ]);

        Technology::create([
            'name' => $this->newTechnologyName,
            'slug' => Str::slug($this->newTechnologyName),
            'icon' => $this->newTechnologyIcon,
        ]);

        $this->reset(['newTechnologyName', 'newTechnologyIcon']);
        $this->loadData();
        session()->flash('message', 'Technology berhasil ditambahkan!');
    }

    public function editTechnology($id)
    {
        $technology = Technology::findOrFail($id);
        $this->editTechnologyId = $id;
        $this->editTechnologyName = $technology->name;
        $this->editTechnologyIcon = $technology->icon;
        $this->showTechnologyForm = true;
    }

    public function updateTechnology()
    {
        $this->validate([
            'editTechnologyName' => 'required|string|max:255|unique:technologies,name,' . $this->editTechnologyId,
            'editTechnologyIcon' => 'nullable|string|max:255',
        ]);

        $technology = Technology::findOrFail($this->editTechnologyId);
        $technology->update([
            'name' => $this->editTechnologyName,
            'slug' => Str::slug($this->editTechnologyName),
            'icon' => $this->editTechnologyIcon,
        ]);

        $this->reset(['editTechnologyId', 'editTechnologyName', 'editTechnologyIcon', 'showTechnologyForm']);
        $this->loadData();
        session()->flash('message', 'Technology berhasil diupdate!');
    }

    public function deleteTechnology($id)
    {
        $technology = Technology::findOrFail($id);

        // Check if technology is used in any details
        $usedInProjects = $technology->projectDetails()->exists();
        $usedInExperiences = $technology->experienceDetails()->exists();
        $usedInCertificates = $technology->certificateDetails()->exists();
        $usedInEducations = $technology->educationDetails()->exists();

        if ($usedInProjects || $usedInExperiences || $usedInCertificates || $usedInEducations) {
            session()->flash('error', 'Technology tidak bisa dihapus karena sedang digunakan!');
            return;
        }

        $technology->delete();
        $this->loadData();
        session()->flash('message', 'Technology berhasil dihapus!');
    }

    public function cancelEditTechnology()
    {
        $this->reset(['editTechnologyId', 'editTechnologyName', 'editTechnologyIcon', 'showTechnologyForm']);
    }

    // ========== CATEGORY CRUD ==========

    public function addCategory()
    {
        $this->validate([
            'newCategoryName' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $this->newCategoryName,
            'slug' => Str::slug($this->newCategoryName),
        ]);

        $this->reset(['newCategoryName']);
        $this->loadData();
        session()->flash('message', 'Category berhasil ditambahkan!');
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $this->editCategoryId = $id;
        $this->editCategoryName = $category->name;
        $this->showCategoryForm = true;
    }

    public function updateCategory()
    {
        $this->validate([
            'editCategoryName' => 'required|string|max:255|unique:categories,name,' . $this->editCategoryId,
        ]);

        $category = Category::findOrFail($this->editCategoryId);
        $category->update([
            'name' => $this->editCategoryName,
            'slug' => Str::slug($this->editCategoryName),
        ]);

        $this->reset(['editCategoryId', 'editCategoryName', 'showCategoryForm']);
        $this->loadData();
        session()->flash('message', 'Category berhasil diupdate!');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);

        // Check if category is used in any details
        $usedInProjects = $category->projectDetails()->exists();
        $usedInExperiences = $category->experienceDetails()->exists();
        $usedInCertificates = $category->certificateDetails()->exists();
        $usedInEducations = $category->educationDetails()->exists();

        if ($usedInProjects || $usedInExperiences || $usedInCertificates || $usedInEducations) {
            session()->flash('error', 'Category tidak bisa dihapus karena sedang digunakan!');
            return;
        }

        $category->delete();
        $this->loadData();
        session()->flash('message', 'Category berhasil dihapus!');
    }

    public function cancelEditCategory()
    {
        $this->reset(['editCategoryId', 'editCategoryName', 'showCategoryForm']);
    }

    // ========== TOGGLE FUNCTIONS ==========

    public function toggle()
    {
        $this->show = !$this->show;
        if ($this->show) {
            $this->loadData();
        }
    }

    public function toggleTechnologyForm()
    {
        $this->showTechnologyForm = !$this->showTechnologyForm;
        if (!$this->showTechnologyForm) {
            $this->reset(['editTechnologyId', 'editTechnologyName', 'editTechnologyIcon']);
        }
    }

    public function toggleCategoryForm()
    {
        $this->showCategoryForm = !$this->showCategoryForm;
        if (!$this->showCategoryForm) {
            $this->reset(['editCategoryId', 'editCategoryName']);
        }
    }

    public function mount()
    {
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.section.skill', [
            'rules' => $this->rules,
            'technologies' => $this->technologies,
            'categories' => $this->categories,
        ]);
    }
}
