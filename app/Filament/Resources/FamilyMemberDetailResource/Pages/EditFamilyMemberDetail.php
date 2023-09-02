<?php

namespace App\Filament\Resources\FamilyMemberDetailResource\Pages;

use App\Filament\Resources\FamilyMemberDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFamilyMemberDetail extends EditRecord
{
    protected static string $resource = FamilyMemberDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
