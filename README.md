## Project Setup

## ! Cloner le repo et installer les dépendances

```bash
  git clone https://github.com/Warisaremou/tp_02.git
  code tp_02
  cp .env.example .env
  composer install
  php artisan key:generate
  php artisan storage:link
  php artisan migrate
  php artisan db:seed
  npm install
  npm run dev
  php artisan serve
```
# NB: Avant de lancer la migration, configurer le fichier .env en ajoutant le nom de la base de donnée et le mot de passe de la BDD

Installer laravel

```bash
  composer create-project laravel/laravel tp_02
  cd TP_02
```

Installer Bootstrap

```bash
  composer require laravel/ui --dev
  php artisan ui bootstrap --auth
  npm install
  npm run dev
```

### Quelques commandes

Création de model avec migration, factory et seeder

```bash
  php artisan make:model Livres -mfs
```

Lancer les migrations

```bash
  php artisan migrate
```

Lancer les seeders

```bash
  php artisan db:seed
```

Création d'un controller

```bash
  php artisan make:controller LivresController
```

Création d'un controller avec les méthodes CRUD

```bash
  php artisan make:controller LivresController --resource
```

Création d'un request pour valider les données

```bash
  php artisan make:request CreateLivresRequest
```

## Note: N'oubliez pas le fillable dans les models

## Note: Dans les fichiers de request il faut changer retourner true par return false

```php
<?php

public function authorize(): bool
{
    return true;
}

```

## Modifier le fichier app/Providers/AppServiceProvider.php pour la pagination

```php
<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}

```
