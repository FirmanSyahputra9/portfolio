<?php

namespace App\Livewire\Section;

use App\Models\Category;
use App\Models\CertificateData;
use App\Models\CertificateDetail;
use App\Models\Issuer;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Certificate extends Component
{
    use WithFileUploads;

    public $show = false;
    public $certificates = [];
    public $photo;
    public $tempPhotos = [];
    public $show2 = [];
    public $issuers = [];
    public $addCertificateTitleId, $addCertificateIssuerId, $addCertificateIssuedDate;

    public $technologyInputs = [];
    public $categoryInputs = [];

    public $technologySearch = [];
    public $categorySearch = [];


    protected $rules = [
        'tempPhotos.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        'addCertificateTitleId' => 'required',
        'addCertificateIssuerId' => 'required',
        'addCertificateIssuedDate' => 'required',

    ];

    private function loadCertificates()
    {
        $user = Auth::user();

        $this->certificates = $user->certificateData()
            ->with([
                'issuer:id,slug,name',
                'certificateDetails:id,certificate_id,technology_id,category_id',
                'certificateDetails.technology:id,name,slug',
                'certificateDetails.category:id,name,slug',
            ])
            ->select([
                'id',
                'title_id',
                'title_en',
                'issuer_id',
                'description_id',
                'description_en',
                'issued_date',
                'expiration_date',
                'credential_id',
                'credential_url',
                'image',
            ])
            ->get()
            ->toArray();
        // dd($this->certificates);
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
            [
                'name' => $technologyName,
            ],
            [
                'slug' => Str::slug($technologyName),
            ]
        );

        // Cari atau buat Category
        $category = Category::firstOrCreate(
            [
                'name' => $categoryName,
            ],
            [
                'slug' => Str::slug($categoryName),
            ]
        );

        // Buat relasi certificate dengan technology + category
        CertificateDetail::create([
            'certificate_id' => $this->certificates[$index]['id'],
            'technology_id' => $technology->id,
            'category_id' => $category->id,
        ]);

        // Kosongkan input
        $this->technologyInputs[$index] = '';
        $this->categoryInputs[$index] = '';

        // Reload data
        $this->loadCertificates();
    }
    public function removeTechnology($certificateIndex, $detailIndex)
    {
        $detail = $this->certificates[$certificateIndex]['certificate_details'][$detailIndex] ?? null;

        if (!$detail) {
            return;
        }

        CertificateDetail::where('id', $detail['id'])->delete();

        $this->loadCertificates();
    }

    public function addCertificateButton()
    {
        $this->validate();
        $certificate = CertificateData::create([
            'user_id' => Auth::id(),
            'title_id' => $this->addCertificateTitleId,
            'title_en' => '',
            'issuer_id' => $this->addCertificateIssuerId,
            'description_id' => '',
            'description_en' => '',
            'issued_date' => $this->addCertificateIssuedDate,
        ]);

        $this->reset([
            'addCertificateTitleId',
            'addCertificateIssuerId',
            'addCertificateIssuedDate',
        ]);

        $this->loadCertificates();

        $index = collect($this->certificates)
            ->search(fn($item) => $item['id'] == $certificate->id);

        if ($index !== false) {
            $this->show2[$index] = true;
        }

        session()->flash('message', 'Sertifikat berhasil ditambahkan!');
    }

    public function removeCertificateButton($index)
    {
        if (!isset($this->certificates[$index])) {
            session()->flash('error', 'Tombol tidak ditemukan!');
            return;
        }

        $certificateId = $this->certificates[$index]['id'] ?? null;

        if ($certificateId) {
            CertificateData::where('id', $certificateId)->delete();
        }

        unset($this->certificates[$index]);

        $this->certificates = array_values($this->certificates);

        session()->flash('message', 'Tombol berhasil dihapus!');
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

        $certificate = $this->certificates[$index];

        $oldPhotoPath = $certificate['image'] ?? null;

        $path = $this->tempPhotos[$index]->store(
            'certificate',
            'public'
        );

        $user = User::findOrFail(Auth::id());

        $user->certificateData()
            ->where('id', $certificate['id'])
            ->update([
                'image' => $path,
            ]);

        if ($oldPhotoPath && $oldPhotoPath !== $path) {
            Storage::disk('public')->delete($oldPhotoPath);
        }


        $this->certificates[$index]['image'] = $path;

        unset($this->tempPhotos[$index]);

        session()->flash('message', 'Foto sertifikat berhasil diperbarui');
    }


    public function mount()
    {
        $this->loadCertificates();

        $this->issuers = Issuer::select('id', 'name')
            ->orderBy('name')
            ->get()
            ->toArray();
    }



    public function updatedCertificates($value, $key)
    {
        if (str_ends_with($key, '.issued_date')) {

            $index = explode('.', $key)[0];

            $this->certificates[$index]['expiration_date'] =
                \Carbon\Carbon::parse($value)->addYears(3)->format('Y-m-d');
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

    public function saveCertificate()
    {
        foreach ($this->certificates as $certificateData) {
            if (isset($certificateData['id'])) {
                CertificateData::where('id', $certificateData['id'])
                    ->where('user_id', Auth::id())
                    ->update([
                        'title_id' => $certificateData['title_id'],
                        'title_en' => $certificateData['title_en'],
                        'description_id' => $certificateData['description_id'],
                        'description_en' => $certificateData['description_en'],
                        'issued_date' => $certificateData['issued_date'],
                        'expiration_date' => $certificateData['expiration_date'],
                        'credential_id' => $certificateData['credential_id'],
                        'credential_url' => $certificateData['credential_url'],
                        'issuer_id' => $certificateData['issuer_id'],
                    ]);
            }
        }

        session()->flash('message', 'Certificate berhasil disimpan!');
    }

    public function render()
    {
        return view('livewire.section.certificate', [
            'rules' => $this->rules
        ]);
    }
}
