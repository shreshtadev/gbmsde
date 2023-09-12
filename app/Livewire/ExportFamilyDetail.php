<?php

namespace App\Livewire;

use App\Livewire\Forms\FamilyDetailFilterForm;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class ExportFamilyDetail extends Component
{

    public FamilyDetailFilterForm $familyFilterDetailForm;
    public array $vedas = ['rig', 'yajur', 'sama'];
    public array $categories = ['advaita', 'dwaita', 'vishisthadwaita'];

    public function exportCsv()
    {
        return $this->familyFilterDetailForm->generateCsv();
    }

    public function render(): View
    {
        return view('livewire.export-family-detail');
    }
}
