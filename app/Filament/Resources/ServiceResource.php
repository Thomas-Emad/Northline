<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Actions;
use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-squares-2x2';

    protected static string|\UnitEnum|null $navigationGroup = 'Portfolio';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('Translations')->tabs([
                Tab::make('English')->schema([
                    Forms\Components\TextInput::make('title.en')
                        ->label('Title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (?string $state, Forms\Set $set) => $set('slug', Str::slug($state ?? ''))),
                    Forms\Components\TextInput::make('short_description.en')->label('Short description')->required()->maxLength(255),
                    Forms\Components\RichEditor::make('full_description.en')->label('Full description'),
                    Forms\Components\TagsInput::make('features.en')->label('Features'),
                ]),
                Tab::make('العربية')->schema([
                    Forms\Components\TextInput::make('title.ar')->label('العنوان')->required()
                        ->extraInputAttributes(['dir' => 'rtl']),
                    Forms\Components\TextInput::make('short_description.ar')->label('وصف مختصر')->required()->maxLength(255)
                        ->extraInputAttributes(['dir' => 'rtl']),
                    Forms\Components\RichEditor::make('full_description.ar')->label('الوصف الكامل'),
                    Forms\Components\TagsInput::make('features.ar')->label('الميزات'),
                ]),
            ])->columnSpanFull(),

            Section::make('Settings')->schema([
                Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('icon')->helperText('Icon key rendered on the public site, e.g. "code", "stack".'),
                Forms\Components\TagsInput::make('technologies')->helperText('Product/technology names are the same in every language.'),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
                Forms\Components\Toggle::make('is_active')->default(true),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Admin list always shows English for consistency, regardless
                // of which locale a visitor last picked on the public site.
                Tables\Columns\TextColumn::make('title')
                    ->formatStateUsing(fn ($record) => $record->translated('title', 'en'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('short_description')
                    ->formatStateUsing(fn ($record) => $record->translated('short_description', 'en'))
                    ->limit(50),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
            ])
            ->defaultSort('sort_order')
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->reorderable('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
