<?php
namespace App\Livewire;
use Livewire\Component;
use App\Models\ModuleLkpd;

class Makan extends Component
{
    public $moduleLkpdId;
    public $moduleLkpd;
    public $tags = [];

    public function mount($id) 
    {
        $this->moduleLkpdId = $id;
        $this->loadModuleLkpd();
    }

    public function loadModuleLkpd()
    {
        $this->moduleLkpd = ModuleLkpd::with(['tags' => function($query) {
            $query->select('tags.*', 'module_lkpd_tags.lkpd_id');
        }])->findOrFail($this->moduleLkpdId);

        // dd([
        //     'id' => $this->moduleLkpdId,
        //     'tags' => $this->moduleLkpd->tags->toArray(),
        //     'raw_query' => ModuleLkpd::with(['tags'])->find($this->moduleLkpdId)->toSql()
        // ]);
        // $this->tags = $this->moduleLkpd->tags ?? collect([]);
    }

    public function render()
    {
        return view('livewire.makan');
    }
}