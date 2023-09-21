<?php

namespace App\Livewire\Forms;

use App\Imports\FamilyDetailImport;
use App\Imports\FamilyMemberDetailImport;
use App\Models\DailyWorkLog;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;

class DailyWorkLogForm extends Form
{
    public $worklogAttachment;

    #[Rule("in:FamilyDetail,FamilyMemberDetail")]
    public string $uploadedFileType = 'FamilyDetail';

    public function saveWorkLog()
    {
        $pathToImport = $this->worklogAttachment->getRealPath();
        $dailyWorkLog = DailyWorkLog::create([
            'user_id' => auth()->user()->id,
            'data_import_status' => 'NOT_STARTED',
            'uploaded_filetype' => $this->uploadedFileType
        ]);
        if (strtolower('FamilyMemberDetail') == strtolower($this->uploadedFileType)) {
            Excel::import(new FamilyMemberDetailImport($dailyWorkLog), $pathToImport);
        }
        Excel::import(new FamilyDetailImport($dailyWorkLog), $pathToImport);
    }
}
