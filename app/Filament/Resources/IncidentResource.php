<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IncidentResource\Pages;
use App\Filament\Resources\IncidentResource\RelationManagers;
use App\Models\Incident;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IncidentResource extends Resource
{
    protected static ?string $model = Incident::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // REMOVED DUPLICATE EMPTY FUNCTION HERE

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Incident Details')
                    ->schema([
                        // 1. Search for a Student
                        Forms\Components\Select::make('student_id')
                            ->relationship('student', 'last_name') // Searches by last name
                            ->getOptionLabelFromRecordUsing(fn ($record) => "{$record->last_name}, {$record->first_name}")
                            ->searchable()
                            ->preload()
                            ->required(),

                        // 2. Violation Type (Standardized List)
                        Forms\Components\Select::make('violation_type')
                            ->options([
                                'Tardiness' => 'Tardiness',
                                'Bullying' => 'Bullying',
                                'Cutting Classes' => 'Cutting Classes',
                                'Improper Uniform' => 'Improper Uniform',
                            ])
                            ->required(),

                        // 3. Date and Time 
                        Forms\Components\DatePicker::make('incident_date')
                            ->required()
                            ->default(now()),
                        
                        Forms\Components\TimePicker::make('incident_time')
                            ->required()
                            ->default(now()),
                        
                        Forms\Components\TextInput::make('location')
                            ->required(),
                    ])->columns(2),

                Forms\Components\Section::make('Documentation & Action')
                    ->schema([
                        // 4. Narrative Report (Optional Scanned Image)
                        Forms\Components\FileUpload::make('narrative_image_path')
                            ->label('Scanned Narrative Report')
                            ->image()
                            ->directory('incident-reports')
                            ->visibility('public') 
                            ->nullable(),

                        // 5. Sanction & Status
                        Forms\Components\Textarea::make('sanction')
                            ->label('Initial Sanction/Intervention'),

                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending Review',
                                'validated' => 'Validated',
                                'closed' => 'Closed / Done',
                            ])
                            ->default('pending')
                            ->required(),
                    ]),
            ]);
    }

   public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('student.last_name')
                ->label('Student')
                ->sortable()
                ->searchable(),
            
            Tables\Columns\TextColumn::make('violation_type')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Bullying' => 'danger',
                    'Tardiness' => 'warning',
                    default => 'gray',
                }),

            Tables\Columns\TextColumn::make('incident_date')
                ->date()
                ->sortable(),

            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'pending' => 'warning',
                    'validated' => 'info',
                    'closed' => 'success',
                }),
        ])
        ->filters([
            // Filter to help Principal find "Pending" cases quickly
            Tables\Filters\SelectFilter::make('status')
                ->options([
                    'pending' => 'Pending',
                    'validated' => 'Validated',
                    'closed' => 'Closed',
                ]),
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
            'index' => Pages\ListIncidents::route('/'),
            'create' => Pages\CreateIncident::route('/create'),
            'edit' => Pages\EditIncident::route('/{record}/edit'),
        ];
    }
}