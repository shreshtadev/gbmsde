<?php

namespace App\Livewire;

use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class ExportFamilyDetail extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('veda')
                    ->label('ವೇದ')
                    ->options([
                        'rig' => 'ಋಗ್ವೇದ',
                        'yajur' => 'ಯಜುರ್ವೇದ',
                        'sama' => 'ಸಾಮವೇದ'
                    ])
                    ->default('yajur')
                    ->native(false),
                Forms\Components\Select::make('category')
                    ->label('ಪಂಗಡ')
                    ->options([
                        'advaita' => 'ಅದ್ವೈತ',
                        'dwaita' => 'ದ್ವೈತ',
                        'vishisthadwaita' => 'ವಿಶಿಷ್ಟಾದ್ವೈತ'
                    ])
                    ->default('advaita')
                    ->native(false),
                Forms\Components\TextInput::make('taluk')
                    ->label('ತಾಲೂಕು')
                    ->maxLength(255),
                Forms\Components\TextInput::make('area')
                    ->label('ಪ್ರದೇಶ')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sub_category')
                    ->label('ಉಪಪಂಗಡ')
                    ->maxLength(255)
                    ->default('smartha')
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        $data = $this->form->getState();

        var_dump($data);
    }

    public function render(): View
    {
        return view('livewire.export-family-detail');
    }
}
