<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FamilyMemberDetailResource\Pages;
use App\Filament\Resources\FamilyMemberDetailResource\RelationManagers;
use App\Models\FamilyDetail;
use App\Models\FamilyMemberDetail;
use BezhanSalleh\FilamentShield\Traits\HasFilamentShield;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FamilyMemberDetailResource extends Resource
{
    use HasFilamentShield;
    protected static ?string $model = FamilyMemberDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('member_name')
                    ->label('ಸದಸ್ಯರ ಹೆಸರು')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email_address')
                    ->label('ಇಮೇಲ್')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->label('ದೂರವಾಣಿ ಸಂಖ್ಯೆ')
                    ->tel()
                    ->required()
                    ->maxLength(30),
                Forms\Components\TextInput::make('related_as')
                    ->label('ಸಂಬಂಧ')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\Toggle::make('is_married')
                    ->label('ವಿವಾಹಿತ/ಅವಿವಾಹಿತ')
                    ->required()
                    ->onColor('success')
                    ->offColor('danger')
                    ->default(false),
                Forms\Components\TextInput::make('age')
                    ->label('ವಯಸ್ಸು')
                    ->required()
                    ->numeric()
                    ->default(10),
                Forms\Components\TextInput::make('education_occupation_details')
                    ->label('ವಿದ್ಯಾರ್ಥಿ/ಉದ್ಯೋಗ ವಿವರ')
                    ->maxLength(255),
                Forms\Components\Select::make('family_detail_id')
                    ->label('ಕುಟುಂಬ')
                    ->options(FamilyDetail::all()->pluck('name_of_head_of_family', 'id'))
                    ->native(false)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->deferLoading()
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('member_name')
                    ->label('ಸದಸ್ಯರ ಹೆಸರು')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_address')->label('ಇಮೇಲ್')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')->label('ದೂರವಾಣಿ ಸಂಖ್ಯೆ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('related_as')
                    ->label('ಸಂಬಂಧ')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_married')->label('ವಿವಾಹಿತ/ಅವಿವಾಹಿತ')
                    ->onColor('success')
                    ->offColor('danger')
                    ->sortable(),
                Tables\Columns\TextColumn::make('age')->label('ವಯಸ್ಸು')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('education_occupation_details')->label('ವಿದ್ಯಾರ್ಥಿ/ಉದ್ಯೋಗ ವಿವರ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('familyDetail.name_of_head_of_family')
                    ->label('ಕುಟುಂಬ')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFamilyMemberDetails::route('/'),
            'create' => Pages\CreateFamilyMemberDetail::route('/create'),
            'edit' => Pages\EditFamilyMemberDetail::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
