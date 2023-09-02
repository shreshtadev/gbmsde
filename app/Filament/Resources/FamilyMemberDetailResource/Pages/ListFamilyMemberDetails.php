<?php

namespace App\Filament\Resources\FamilyMemberDetailResource\Pages;

use App\Filament\Resources\FamilyMemberDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFamilyMemberDetails extends ListRecords
{
    protected static string $resource = FamilyMemberDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
