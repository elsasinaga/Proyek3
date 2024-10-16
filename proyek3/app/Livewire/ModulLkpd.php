<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\UploadedFile;
use Livewire\TemporaryUploadedFile;
use App\Models\ModuleLkpd;
use App\Models\LkpdStep;

class ModulLkpd extends Component
{
    use WithFileUploads;

    public $currentStep = 1;
    public $judul, $jenjang, $kelas, $category, $kolaborasi, $tags;
    public $introduction, $gambarIntroduction;
    public $bahanBahan, $gambarBahanBahan;
    public $categories;
    public $steps=[];

    public $jenjangOption = [
        ['jenjang' => 'SD'],
        ['jenjang' => 'SMP'],
        ['jenjang' => 'SMA']
    ];
    
    public $kelasOptions = [
        ['id' => 1, 'kelas' => '1'], ['id' => 2, 'kelas' => '2'], ['id' => 3, 'kelas' => '3'],
        ['id' => 4, 'kelas' => '4'], ['id' => 5, 'kelas' => '5'], ['id' => 6, 'kelas' => '6'],
        ['id' => 7, 'kelas' => '7'], ['id' => 8, 'kelas' => '8'], ['id' => 9, 'kelas' => '9'],
        ['id' => 10, 'kelas' => '10'], ['id' => 11, 'kelas' => '11'], ['id' => 12, 'kelas' => '12']
    ];
    
    protected $listeners = ['stepsUpdated'];
    
    public function mount()
    {
        $this->categories = Category::take(2)->get();
        $this->steps = [
                ['gambarLangkah' => '', 'judulLangkah' => '', 'deskripsiLangkah' => '']
        ];
    }

    public function render()
    {
        return view('livewire.module-lkpd', [
            'jenjangOption' => $this->jenjangOption,
            'kelasOptions' => $this->kelasOptions,
            'categories' => $this->categories,
        ]);
    }

    public function stepsUpdated($updatedSteps)
    {
        $this->steps = $updatedSteps;
    }

    public function nextStep()
    {
        $this->validateStep($this->currentStep);
        $this->currentStep++;
    }

    public function previousStep()
    {
        $this->currentStep--;
    }

    private function validateStep($step)
    {
        switch ($step) {
            case 1:
                $this->validate([
                    'judul' => 'required',
                    'jenjang' => 'required',
                    'kelas' => 'required',
                    'category' => 'required',
                    'kolaborasi' => 'nullable',
                    'tags' => 'nullable',
                ]);
                break;
            case 2:
                $this->validate([
                    'introduction' => 'required',
                    'gambarIntroduction' => 'nullable|image|max:1024',
                ]);
                break;
            case 3:
                $this->validate([
                    'bahanBahan' => 'required',
                    'gambarBahanBahan' => 'nullable|image|max:1024',
                ]);
                break;
        }
    }

    private function storeImage($image, $directory)
{
    if ($image instanceof UploadedFile || $image instanceof TemporaryUploadedFile) {
        return $image->store($directory, 'public');
    }
    return $image; // Return as is if it's already a string (path) or null
}

    public function submitForm()
    {
        $this->validateStep(3);
        $introductionImagePath = $this->storeImage($this->gambarIntroduction, 'introduction_images');
        $bahanBahanImagePath = $this->storeImage($this->gambarBahanBahan, 'material_images');

        $lkpd = ModuleLkpd::create([
            'lkpd_title' => $this->judul,
            'Jenjang' => $this->jenjang,
            'Kelas' => $this->kelas,
            'category_id' => $this->category,
            'kolaborasi' => $this->kolaborasi,
            'tags' => $this->tags,
            'lkpd_description' => $this->introduction,
            'lkpd_image' => $introductionImagePath,
            'material_name' => $this->bahanBahan,
            'material_image' => $bahanBahanImagePath,
            'user_id' => auth()->id(), // Gunakan ID pengguna yang sedang login
        ]);

        foreach ($this->steps as $index => $step) {
            LkpdStep::create([
                'lkpd_id' => $lkpd->lkpd_id, // Gunakan lkpd_id sebagai foreign key
                'step_number' => $index + 1,
                'step_title' => $step['judulLangkah'],
                'step_description' => $step['deskripsiLangkah'],
                'step_image' => $this->storeImage($step['gambarLangkah'] ?? null, 'step_images'),
            ]);
        }

        session()->flash('message', 'LKPD berhasil ditambahkan.');
        $this->reset();
        $this->currentStep = 1;
    }
}
