<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
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

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-briefcase';

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
                    Forms\Components\TextInput::make('description.en')->label('Short description')->required()->maxLength(255),
                    Forms\Components\RichEditor::make('long_description.en')->label('Long description'),
                    Forms\Components\TagsInput::make('results.en')->label('Results')->placeholder('e.g. Reduced manual work by 70%'),
                ]),
                Tab::make('العربية')->schema([
                    Forms\Components\TextInput::make('title.ar')->label('العنوان')->required()
                        ->extraInputAttributes(['dir' => 'rtl']),
                    Forms\Components\TextInput::make('description.ar')->label('وصف مختصر')->required()->maxLength(255)
                        ->extraInputAttributes(['dir' => 'rtl']),
                    Forms\Components\RichEditor::make('long_description.ar')->label('الوصف الكامل'),
                    Forms\Components\TagsInput::make('results.ar')->label('النتائج')->placeholder('مثال: تقليل العمل اليدوي بنسبة 70%'),
                ]),
            ])->columnSpanFull(),

            Section::make('Overview')->schema([
                Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('category')->required(),
                Forms\Components\TextInput::make('client'),
            ])->columns(2),

            Section::make('Media')->schema([
                Forms\Components\FileUpload::make('featured_image')->image()->directory('projects'),
                Forms\Components\FileUpload::make('gallery')->image()->multiple()->directory('projects/gallery'),
            ]),

            Section::make('Details')->schema([
                Forms\Components\TagsInput::make('technologies')->helperText('Product/technology names are the same in every language.'),
                Forms\Components\TextInput::make('project_url')->url(),
                Forms\Components\TextInput::make('github_url')->url(),
                Forms\Components\DatePicker::make('completion_date'),
            ])->columns(2),

            Section::make('Publishing')->schema([
                Forms\Components\Toggle::make('is_featured'),
                Forms\Components\Toggle::make('is_published')->default(true),
                Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
            ])->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image'),
                Tables\Columns\TextColumn::make('title')
                    ->formatStateUsing(fn ($record) => $record->translated('title', 'en'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')->badge(),
                Tables\Columns\IconColumn::make('is_featured')->boolean(),
                Tables\Columns\IconColumn::make('is_published')->boolean(),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
            ])
            ->defaultSort('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published'),
                Tables\Filters\TernaryFilter::make('is_featured'),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->reorderable('sort_order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
