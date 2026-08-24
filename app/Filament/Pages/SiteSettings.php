<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Site Settings';

    protected string $view = 'filament.pages.site-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(SiteSetting::current()->toArray());
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Company')->schema([
                Forms\Components\TextInput::make('company_name')->required(),
                Forms\Components\FileUpload::make('logo')->image()->directory('settings'),
                Forms\Components\TextInput::make('email')->email(),
                Forms\Components\TextInput::make('phone'),
                Forms\Components\TextInput::make('address'),
            ])->columns(2),

            Section::make('Homepage Hero')->schema([
                Tabs::make('Hero translations')->tabs([
                    Tab::make('English')->schema([
                        Forms\Components\TextInput::make('hero_eyebrow.en')->label('Eyebrow'),
                        Forms\Components\TextInput::make('hero_title.en')->label('Title'),
                        Forms\Components\Textarea::make('hero_subtitle.en')->label('Subtitle')->rows(3),
                    ]),
                    Tab::make('العربية')->schema([
                        Forms\Components\TextInput::make('hero_eyebrow.ar')->label('الشعار')->extraInputAttributes(['dir' => 'rtl']),
                        Forms\Components\TextInput::make('hero_title.ar')->label('العنوان')->extraInputAttributes(['dir' => 'rtl']),
                        Forms\Components\Textarea::make('hero_subtitle.ar')->label('العنوان الفرعي')->rows(3)->extraInputAttributes(['dir' => 'rtl']),
                    ]),
                ])->columnSpanFull(),
            ]),

            Section::make('Stats')->schema([
                Forms\Components\Repeater::make('stats')->schema([
                    Forms\Components\TextInput::make('value')->numeric()->required(),
                    Forms\Components\TextInput::make('suffix')->default('+'),
                    Forms\Components\TextInput::make('label.en')->label('Label (English)')->required(),
                    Forms\Components\TextInput::make('label.ar')->label('التسمية (عربي)')->required()->extraInputAttributes(['dir' => 'rtl']),
                ])->columns(4)->columnSpanFull(),
            ]),

            Section::make('Technology Stack')->schema([
                Forms\Components\Repeater::make('tech_stack')->schema([
                    Forms\Components\Select::make('key')->options([
                        'frontend' => 'Frontend',
                        'backend' => 'Backend',
                        'database' => 'Database',
                        'infrastructure' => 'Infrastructure',
                    ])->required()->helperText('Category label is translated automatically from the site translations.'),
                    Forms\Components\TagsInput::make('items')->label('Technologies')->required(),
                ])->columns(2)->columnSpanFull(),
            ]),

            Section::make('Footer & Social')->schema([
                Tabs::make('Footer translations')->tabs([
                    Tab::make('English')->schema([
                        Forms\Components\Textarea::make('footer_description.en')->label('Footer description')->rows(2),
                    ]),
                    Tab::make('العربية')->schema([
                        Forms\Components\Textarea::make('footer_description.ar')->label('وصف التذييل')->rows(2)->extraInputAttributes(['dir' => 'rtl']),
                    ]),
                ])->columnSpanFull(),
                Forms\Components\TextInput::make('social_links.linkedin')->label('LinkedIn URL'),
                Forms\Components\TextInput::make('social_links.github')->label('GitHub URL'),
                Forms\Components\TextInput::make('social_links.facebook')->label('Facebook URL'),
                Forms\Components\TextInput::make('social_links.instagram')->label('Instagram URL'),
            ])->columns(2),
        ])->statePath('data');
    }

    public function save(): void
    {
        SiteSetting::current()->update($this->form->getState());

        Notification::make()->title('Settings saved')->success()->send();
    }
}
