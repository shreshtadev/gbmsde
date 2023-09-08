<?php

namespace App\Livewire\Forms;

use App\Exports\FamilyDetailExport;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;

class FamilyDetailFilterForm extends Form
{
    #[Rule("in:rig,yajur,sama")]
    public ?string $veda = 'rig';
    #[Rule("in:advaita,dwaita,vishisthadwaita")]
    public ?string $category = 'advaita';
    public ?string $subCategory = 'smartha';
    public ?string $taluk = '';
    public ?string $area = '';

    public function generateCsv()
    {
        return Excel::download(new FamilyDetailExport($this->all()), ($this->veda ?? '') . ($this->category ?? '') . ($this->subCategory ?? '') . ($this->taluk ?? '') . ($this->area ?? '') . '-' .date('dmY') . '-family-detail.csv');
    }
}
