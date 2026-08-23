# Northline — Laravel + Inertia + Vue + Filament

This package contains the application-layer code for the Northline website:
Models, migrations, controllers, routes, Vue/Inertia pages & components, and
Filament admin resources. It is meant to be dropped into a fresh Laravel
installation (composer/npm install could not be run in this sandbox, since it
has no access to packagist.org / the npm registry for Laravel's own packages).

## 1. Create the base Laravel app

```bash
composer create-project laravel/laravel northline
cd northline
composer require inertiajs/inertia-laravel
composer require filament/filament:"^5.0" -W
php artisan filament:install --panels

npm install
npm install "@inertiajs/vue3@^2.0.0" @vitejs/plugin-vue vue
```

> Make sure `@inertiajs/vue3` resolves to v2 or newer (check with `npm ls @inertiajs/vue3`
> after installing). Older 1.x client versions don't understand the `<script type="application/json">`
> initial-page format that current `inertiajs/inertia-laravel` always emits, and you'll get
> `SyntaxError: "undefined" is not valid JSON` with a blank page. If you already ran
> `npm install` and have a stale lockfile, run `npm install "@inertiajs/vue3@^2.0.0" --save-exact=false`
> and restart `npm run dev`.

> This project targets **Filament v5**. Filament's Resource/Form/Table API is
> unchanged between v4 and v5 (v5 exists mainly for Livewire v4 compatibility),
> so every Filament class in `app/Filament/` below works as-is on v5. If you're
> starting from an existing v4 project instead, upgrade first with:
> `composer require filament/upgrade:"^5.0" -W --dev && vendor/bin/filament-v5`.

## 2. Copy this package's files into the new project

Copy, overwriting where needed:

- `app/Models/*` → `app/Models/`
- `app/Http/Controllers/*` → `app/Http/Controllers/`
- `app/Filament/Resources/*` → `app/Filament/Resources/`
- `database/migrations/*` → `database/migrations/`
- `database/seeders/*` → `database/seeders/`
- `routes/web.php` → `routes/web.php`
- `resources/js/*` → `resources/js/`
- `resources/css/app.css` → `resources/css/app.css`
- `vite.config.js`, `package.json` (merge dependencies)

## 3. Configure Inertia + Vue

In `resources/views/app.blade.php`, use the standard Inertia root view
(`@inertia`, `@vite(['resources/css/app.css','resources/js/app.js'])`).

`resources/js/app.js` should boot Inertia with the Vue 3 adapter and resolve
pages from `./Pages/**/*.vue` — see the file included here.

## 4. Migrate & seed

```bash
php artisan migrate
php artisan db:seed
```

`php artisan db:seed` runs both seeders (via `DatabaseSeeder`):

- **`AdminUserSeeder`** — creates the Filament panel login. Defaults to
  `admin@northline.dev` / `password`, overridable with env vars before seeding:
  ```bash
  ADMIN_EMAIL=you@example.com ADMIN_NAME="Your Name" ADMIN_PASSWORD="something-stronger" php artisan db:seed --class=AdminUserSeeder
  ```
  **Change the password before deploying anywhere but local.** `canAccessPanel()`
  on the `User` model currently allows any authenticated user into `/admin` —
  tighten that (role check, email allow-list, etc.) before going to production.
- **`NorthlineSeeder`** — the placeholder services/projects/testimonials/settings
  content described above. Can still be run alone with `--class=NorthlineSeeder`.

Also copy `app/Models/User.php` from this package over your project's default
`User` model — it adds `implements FilamentUser` and `canAccessPanel()`, which
Filament requires to let a user into the panel at all.

## 5. Run

```bash
composer run dev
```
(or `php artisan serve` + `npm run dev` in separate terminals)

Visit `/` for the public site and `/admin` for the Filament panel.

## Content model

- **Project** — portfolio case studies (title, slug, description, category,
  client, technologies[], featured_image, gallery[], urls, dates, featured/published flags)
- **Service** — the six service offerings (title, slug, description, icon,
  features[], technologies[], sort order, active flag)
- **Testimonial** — client quotes (name, company, position, quote, avatar, rating, published)
- **ContactMessage** — inbound leads from the contact form
- **SiteSetting** — single-row settings model (company info, hero copy, stats, footer, socials)

All public pages read from these models via the controllers in
`app/Http/Controllers`, so everything the brief called out as "should come
from the admin" is wired that way already — nothing about projects, services,
testimonials, or site settings is hard-coded in the Vue pages.
