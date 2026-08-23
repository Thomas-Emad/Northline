<?php

namespace App\Models;

// Note: this file is meant to replace the default App\Models\User that
// ships with a fresh Laravel install. Copy over app/Models/User.php with
// this content (or merge the Filament bits into your existing User model).

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Every user in this seed setup is allowed into the admin panel.
     * Tighten this (e.g. check a role or an allow-list of emails) before
     * deploying anywhere real users might sign up.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
}
