<?php

namespace App\Livewire;

use App\Livewire\Forms\DailyWorkLogForm;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\WithFileUploads;

class DailyWorkLogs extends Component {

    use WithFileUploads;

    public DailyWorkLogForm $dailyWorkLogForm;

    public function addWorkLog() {
        Log::debug('Importing Family/Member Details.');
        $this->dailyWorkLogForm->saveWorkLog();
        Log::debug('Completed Importing Family/Member Details.');
        return redirect()->route('dashboard');
    }

    public function render(): View {
        return view('livewire.daily-work-logs.index');
    }
}
