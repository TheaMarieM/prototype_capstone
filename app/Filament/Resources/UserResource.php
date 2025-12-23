<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Pages\CreateRecord;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // 1. Name Field
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                // 2. The New Manual ID Field
                Forms\Components\TextInput::make('identity_number')
                    ->label('School ID / Employee ID') // This matches your login requirement
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                // 3. The Role Dropdown
                Forms\Components\Select::make('role')
                    ->options([
                        'discipline_chair' => 'Discipline Chair',
                        'principal' => 'Principal',
                        'asst_principal' => 'Assistant Principal',
                        'adviser' => 'Adviser',
                        'student' => 'Student',
                        'parent' => 'Parent',
                    ])
                    ->required(),

                // 4. Email (Optional now)
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),

                // 5. Password
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(fn ($livewire) => $livewire instanceof CreateRecord)
                    ->dehydrated(fn ($state) => filled($state))
                    ->hiddenOn('edit'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
