<?php

namespace App\Livewire\Lkpd;

use Livewire\Component;
use App\Models\ModuleLkpd;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf; // Pastikan Anda sudah menginstall paket barryvdh/laravel-dompdf
use Illuminate\Support\Facades\Storage;

class LkpdDetail extends Component
{
    public $isLoved = false;
    public $showNotification = false;
    public $moduleLkpdId;
    public $moduleLkpd;
    public $user;

    public function mount($id) 
    {
        $this->user = User::find(2); // Definisikan user secara eksplisit
        $this->moduleLkpdId = $id;
        $this->checkIsLoved();
        $this->loadModuleLkpd();
    }
    
    public function loadModuleLkpd()
    {
        $this->moduleLkpd = ModuleLkpd::with(['tags', 'collaborator', 'user'])
                                     ->findOrFail($this->moduleLkpdId);
    }

    public function showDownloadNotification()
    {
        session()->flash('notification', 'LKPD sudah diunduh');
        $this->showNotification = true;
    }

    public function hideNotification()
    {
        $this->showNotification = false;
    }

    public function checkIsLoved()
    {
        $this->isLoved = ModuleLkpd::find($this->moduleLkpdId)
            ->likes()
            ->where('user_id', $this->user->id)
            ->exists();
    }
    
    public function toggleLove()
    {
        if ($this->isLoved) {
            // Remove like
            $this->moduleLkpd->likes()->detach($this->user->id);
            $this->isLoved = false;
        } else {
            // Add like
            $this->moduleLkpd->likes()->attach($this->user->id);
            $this->isLoved = true;
        }
    }

    public function render()
    {
        $collaboratorNames = $this->moduleLkpd->collaborator->pluck('collaborator_name')->toArray();
        $collaboratorString = implode(', ', $collaboratorNames);

        return view('livewire.lkpd.lkpd-detail', [
            'collaboratorString' => $collaboratorString,
        ]);
    }

    public function downloadPdf()
    {
        $moduleLkpd = ModuleLkpd::with([
            'tags', 
            'collaborator', 
            'user', 
            'lkpdSteps' => function($query) {
                $query->orderBy('step_number');
            }
        ])->findOrFail($this->moduleLkpdId);

        // Ambil nama kolaborator
        $collaboratorNames = $moduleLkpd->collaborator->pluck('collaborator_name')->toArray();
        $collaboratorString = implode(', ', $collaboratorNames);

        // Generate nama file unik
        $filename = 'LKPD_' . $moduleLkpd->lkpd_title . '_' . now()->format('YmdHis') . '.pdf';

        $pdf = PDF::loadView('pdf.lkpd-detail', [
            'moduleLkpd' => $moduleLkpd,
            'collaboratorString' => $collaboratorString
        ])->setPaper('a4');

        // Tambahkan notifikasi download
        $this->showDownloadNotification();

        // Return PDF untuk di-download
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $filename);
    }

    public function downloadRubrik()
    {
        $moduleLkpd = ModuleLkpd::with('category')->findOrFail($this->moduleLkpdId);

        // Generate nama file unik
        $filename = 'Rubrik_Penilaian_' . $moduleLkpd->lkpd_title . '_' . now()->format('YmdHis') . '.pdf';

        $pdf = PDF::loadView('pdf.lkpd-rubrik', [
            'moduleLkpd' => $moduleLkpd
        ])->setPaper('a4');

        // Tambahkan notifikasi download
        $this->showDownloadNotification();

        // Return PDF untuk di-download
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, $filename);
    }
    

}
