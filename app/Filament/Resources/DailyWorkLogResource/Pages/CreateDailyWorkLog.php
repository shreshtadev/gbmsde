<?php

namespace App\Filament\Resources\DailyWorkLogResource\Pages;

use App\Filament\Resources\DailyWorkLogResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDailyWorkLog extends CreateRecord
{
    protected static string $resource = DailyWorkLogResource::class;
}
