<?php

namespace App\Filament\Resources\DailyWorkLogResource\Pages;

use App\Filament\Resources\DailyWorkLogResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDailyWorkLogs extends ListRecords
{
    protected static string $resource = DailyWorkLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
