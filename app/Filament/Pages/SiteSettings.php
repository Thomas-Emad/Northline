<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Components\Section;
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
                Forms\Components\TextInput::make('hero_eyebrow'),
                Forms\Components\TextInput::make('hero_title')->columnSpanFull(),
                Forms\Components\Textarea::make('hero_subtitle')->rows(3)->columnSpanFull(),
            ]),

            Section::make('Stats')->schema([
                Forms\Components\Repeater::make('stats')->schema([
                    Forms\Components\TextInput::make('value')->numeric()->required(),
                    Forms\Components\TextInput::make('suffix')->default('+'),
                    Forms\Components\TextInput::make('label')->required(),
                ])->columns(3)->columnSpanFull(),
            ]),

            Section::make('Footer & Social')->schema([
                Forms\Components\Textarea::make('footer_description')->rows(2)->columnSpanFull(),
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
