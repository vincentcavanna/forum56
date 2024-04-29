<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use App\Models\EventStatus;
use App\Models\Talk;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make('Event Details')
                        ->schema([
                            TextInput::make('title')
                                ->required()
                                ->maxLength(255),
                            TextInput::make('description')
                                ->maxLength(255),
                            DateTimePicker::make('start_date')
                                ->required(),
                            DateTimePicker::make('end_date')
                                ->required(),
                            Select::make('status')
                                ->options([
                                    EventStatus::Published->value => 'Published',
                                    EventStatus::Draft->value => 'Draft',
                                ])
                                ->required()
                                ->default('draft'),
                        ]),
                    Step::make('Itinerary')
                        ->schema([
                            Repeater::make('talks')
                                ->relationship('talks')
                                ->schema([
                                    TextInput::make('title')
                                        ->required()
                                        ->maxLength(255),
                                    TextInput::make('description')
                                        ->maxLength(255),
                                    Split::make([
                                        DateTimePicker::make('start_time')
                                            ->required(),
                                        DateTimePicker::make('end_time')
                                            ->required(),
                                    ]),
                                    Select::make('venue_id')
                                        ->relationship('venue', 'name')
                                        ->createOptionForm([
                                            TextInput::make('name')
                                        ])
                                ])
                        ]),

                ])->columnSpan(1)
            ])->columns(1);
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
