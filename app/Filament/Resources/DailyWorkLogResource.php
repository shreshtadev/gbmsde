<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DailyWorkLogResource\Pages;
use App\Filament\Resources\DailyWorkLogResource\RelationManagers;
use App\Models\DailyWorkLog;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class DailyWorkLogResource extends Resource
{
    protected static ?string $model = DailyWorkLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name', fn (Builder $query) => $query->wherenotIn('id', [1, 2]))
                    ->required()->native(false),
                Forms\Components\Select::make('data_import_status')
                    ->options(['NOT_STARTED' => 'NOT_STARTED', 'IN_PROGRESS' => 'IN_PROGRESS', 'COMPLETED' => 'COMPLETED', 'FAILED' => 'FAILED', 'CANCELLED' => 'CANCELLED'])
                    ->required(),
                SpatieMediaLibraryFileUpload::make('uploaded_file_url')->maxSize(1024)->collection('family-details')->required(),
                Forms\Components\Select::make('uploaded_filetype')
                    ->options(['FamilyDetail' => 'Family Detail', 'FamilyMemberDetail' => 'Family Member Detail'])
                    ->required()->native(false),
                Forms\Components\TextInput::make('no_of_rows')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        $authUser = Auth::user();
        $dailyWorkLogList = $authUser->hasRole('app_user') ? DailyWorkLog::where('user_id', $authUser->id) : DailyWorkLog::query();
        return $table
            ->query($dailyWorkLogList)
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
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('data_import_status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('uploaded_filetype')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_of_rows')
                    ->numeric()
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
            'index' => Pages\ListDailyWorkLogs::route('/'),
            'create' => Pages\CreateDailyWorkLog::route('/create'),
            'edit' => Pages\EditDailyWorkLog::route('/{record}/edit'),
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
