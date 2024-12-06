<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\School;

class Sekolah extends Component
{
    public $dataSekolah;
    public bool $tambahData = false;
    public $npsn, $school_name, $school_address;

    public function mount()
    {
        $this->dataSekolah = School::all();
    }

    public function saveData()
    {
        // Validasi data input
        $this->validate([
            'npsn' => 'required|numeric|unique:schools,npsn',
            'school_name' => 'required|string|max:255',
            'school_address' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        School::create([
            'npsn' => $this->npsn,
            'school_name' => $this->school_name,
            'school_address' => $this->school_address,
        ]);

        // Reset input form
        $this->reset(['npsn', 'school_name', 'school_address']);

        // Tutup modal
        $this->tambahData = false;

        // Refresh data sekolah
        $this->dataSekolah = School::all();

        return redirect()->to('/admin/sekolah');
    }

    public function deleteData($npsn)
    {
        $sekolah = School::findOrFail($npsn);
        $sekolah->delete();

        $this->dataSekolah = School::all();
        return redirect()->to('/admin/sekolah')->with('message', 'Data Tags berhasil dihapus.');
        // session()->flash('message', 'Data berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.admin.sekolah');
    }
}
