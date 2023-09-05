<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FamilyDetailResource\Pages;
use App\Filament\Resources\FamilyDetailResource\RelationManagers;
use App\Models\FamilyDetail;
use BezhanSalleh\FilamentShield\Traits\HasFilamentShield;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FamilyDetailResource extends Resource
{
    use HasFilamentShield;
    protected static ?string $model = FamilyDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_of_head_of_family')
                    ->label('ಕುಟುಂಬ ಸದಸ್ಯರ ಹೆಸರು')
                    ->required()
                    ->maxLength(144),
                Forms\Components\TextInput::make('address_line_1')->label('ವಿಳಾಸ')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('taluk')->label('ತಾಲೂಕು')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('area')->label('ಪ್ರದೇಶ')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')->label('ದೂರವಾಣಿ ಸಂಖ್ಯೆ')
                    ->tel()
                    ->required()
                    ->maxLength(30),
                Forms\Components\TextInput::make('email_address')->label('ಇಮೇಲ್')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('occupation')->label('ಉದ್ಯೋಗ')
                    ->maxLength(255),
                Forms\Components\Select::make('category')->label('ಪಂಗಡ')
                    ->options([
                        'advaita' => 'ಅದ್ವೈತ',
                        'dwaita' => 'ದ್ವೈತ',
                        'vishisthadwaita' => 'ವಿಶಿಷ್ಟಾದ್ವೈತ'
                    ])
                    ->required()
                    ->default('advaita')->native(false),
                Forms\Components\TextInput::make('sub_category')->label('ಉಪಪಂಗಡ')
                    ->required()
                    ->maxLength(255)
                    ->default('smartha'),
                Forms\Components\TextInput::make('gotra')
                    ->label('ಗೋತ್ರ')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('veda')->label('ವೇದ')
                    ->options([
                        'rig' => 'ಋಗ್ವೇದ',
                        'yajur' => 'ಯಜುರ್ವೇದ',
                        'sama' => 'ಸಾಮವೇದ'
                    ])
                    ->required()
                    ->default('yajur')->native(false),
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
                Tables\Columns\TextColumn::make('name_of_head_of_family')
                    ->label('ಕುಟುಂಬ ಸದಸ್ಯರ ಹೆಸರು')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address_line_1')->label('ವಿಳಾಸ'),
                Tables\Columns\TextColumn::make('taluk')->label('ತಾಲೂಕು')
                    ->searchable(),
                Tables\Columns\TextColumn::make('area')->label('ಪ್ರದೇಶ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone_number')->label('ದೂರವಾಣಿ ಸಂಖ್ಯೆ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_address')->label('ಇಮೇಲ್')
                    ->searchable(),
                Tables\Columns\TextColumn::make('occupation')->label('ಉದ್ಯೋಗ'),
                Tables\Columns\TextColumn::make('category')->label('ಪಂಗಡ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sub_category')->label('ಉಪಪಂಗಡ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gotra')->label('ಗೋತ್ರ')
                    ->searchable(),
                Tables\Columns\TextColumn::make('veda')->label('ವೇದ')
                    ->searchable(),
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
            'index' => Pages\ListFamilyDetails::route('/'),
            'create' => Pages\CreateFamilyDetail::route('/create'),
            'edit' => Pages\EditFamilyDetail::route('/{record}/edit'),
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
