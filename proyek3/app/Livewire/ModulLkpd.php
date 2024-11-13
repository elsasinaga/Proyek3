<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;
use App\Models\Category;
use App\Models\LkpdStep;
use App\Models\ModuleLkpd;
use Livewire\UploadedFile;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\TemporaryUploadedFile;

class ModulLkpd extends Component
{
    use WithFileUploads;

    public $currentStep = 1;
    public $judul, $jenjang, $kelas, $category, $kolaborasi, $tags;
    public $introduction, $gambarIntroduction;
    public $bahanBahan, $gambarBahanBahan;
    public $categories=[];
    public $steps=[];
    public $lkpdSteps = [];

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
    
    protected $listeners = [
    'lkpdStepsUpdated' => 'updateLkpdSteps'
];

    public function updateLkpdSteps($updatedSteps)
{
    $this->steps = $updatedSteps;
}
    

        public function stepsUpdated($updatedSteps)
    {
        // Update state steps di komponen utama
        $this->steps = $updatedSteps;
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->steps = [
                ['gambarLangkah' => '', 'judulLangkah' => '', 'deskripsiLangkah' => '']
        ];
    }

    public function render()
    {
        //dump($this->categories);
            return view('livewire.module-lkpd', [
            'jenjangOption' => $this->jenjangOption,
            'kelasOptions' => $this->kelasOptions,
            'categories' => $this->categories,
        ]);
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
                    'bahanBahan' => 'required',
                    'gambarBahanBahan' => 'nullable|image|max:1024',
                ]);
                break;
            case 3:
                $this->validate([
                    'steps.*.gambarLangkah' => 'nullable|image|max:1024',
                    "steps.*.judulLangkah" => 'required|string|max:255',
                    'steps.*.deskripsiLangkah' => 'required|string',
                    
                ]);
                break;
        }
        $this->currentStep;
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
        // $this->resetErrorBag();
        // $this->validate([
        //     'judul' => 'required',
        //     'jenjang' => 'required',
        //     'kelas' => 'required',
        //     'category' => 'required',
        //     'kolaborasi' => 'nullable',
        //     'tags' => 'nullable',
        //     'introduction' => 'required',
        //     'gambarIntroduction' => 'nullable|image|max:1024',
        //     'bahanBahan' => 'required',
        //     'gambarBahanBahan' => 'nullable|image|max:1024',
        // ]);
        // // dd($this->steps);
        // foreach ($this->steps as $index => $step) {
        //     $this->validate([
        //         "steps.$index.gambarLangkah" => 'nullable|image|max:1024',
        //         "steps.$index.judulLangkah" => 'required|string|max:255',
        //         "steps.$index.deskripsiLangkah" => 'required|string',
        //     ]);
        // }

        $this->resetErrorBag();
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
            'user_id' => 1, // Gunakan ID pengguna yang sedang login
        ]);

        foreach ($this->steps as $index => $step) {
            LkpdStep::create([
                'lkpd_id' => $lkpd->lkpd_id,
                'step_number' => $index + 1,
                'step_title' => $step['judulLangkah'],
                'step_description' => $step['deskripsiLangkah'],
                'step_image' => $this->storeImage($step['gambarLangkah'] ?? null, 'step_images'),
            ]);
        }

        session()->flash('message', 'LKPD berhasil ditambahkan.');
        $this->dispatch("resetProp");
    }

    #[On('resetProp')]
    public function resetProp(){
        $this->reset();
    }
}