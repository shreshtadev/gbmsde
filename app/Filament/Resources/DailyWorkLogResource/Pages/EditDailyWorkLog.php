<?php

namespace App\Filament\Resources\DailyWorkLogResource\Pages;

use App\Filament\Resources\DailyWorkLogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDailyWorkLog extends EditRecord
{
    protected static string $resource = DailyWorkLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
