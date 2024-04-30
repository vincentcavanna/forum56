<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use App\Models\EventStatus;
use App\Models\Talk;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
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
                Stack::make([
                    Tables\Columns\TextColumn::make('title')
                        ->weight(FontWeight::Bold)
                        ->searchable(),

                    Tables\Columns\TextColumn::make('duration')
                        ->state(function (Event $record): string {
                            $start = $record->start_date()->setTimezone("CST");
                            $end = $record->end_date()->setTimezone("CST");
                            $startFmt = $start->format('jS F Y, g:i A');
                            if ($start->isSameDay($end)) {
                                return $startFmt . ' - ' . $end->format('g:i A');
                            } else {
                                return $startFmt . ' - ' . $end->format('jS F, g:i A');
                            }
                        })
                        ->label('Event Duration')
                        ->icon('heroicon-o-clock'),
                    Tables\Columns\TextColumn::make('description')
                        ->color('gray')
                        ->searchable(),
                    Tables\Columns\TextColumn::make('status')
                        ->badge()
                        ->color(fn(string $state): string => match ($state) {
                            EventStatus::Published->value => 'success',
                            EventStatus::Draft->value => 'warning',
                            default => 'secondary',
                        }),
                ])
            ])
            ->contentGrid(['md' => 2])
            ->filters([
                //
            ])
            ->defaultGroup('status')
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
                                        ->maxLength(255)
                                        ->prefixIcon('heroicon-o-document-text'),
                                    TextInput::make('description')
                                        ->maxLength(255)
                                        ->prefixIcon('heroicon-o-bars-3-bottom-left'),
                                    Split::make([
                                        DateTimePicker::make('start_time')
                                            ->seconds(false)
                                            ->minutesStep(5)
                                            ->native(false)
                                            ->required()
                                            ->prefixIcon('heroicon-o-clock'),
                                        DateTimePicker::make('end_time')
                                            ->seconds(false)
                                            ->minutesStep(5)
                                            ->native(false)
                                            ->required()
                                            ->prefixIcon('heroicon-o-clock'),
                                    ]),
                                    Select::make('venue_id')
                                        ->relationship('venue', 'name')
                                        ->createOptionForm([
                                            TextInput::make('name')
                                        ])
                                        ->prefixIcon('heroicon-o-map-pin')
                                        ->prefixIconColor('info'),
                                ])
                                ->itemLabel(fn(array $state): ?string => $state['title'] ?? null),
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
