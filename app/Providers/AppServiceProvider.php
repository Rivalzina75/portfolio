<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // 👈 AJOUTE ÇA EN HAUT

class AppServiceProvider extends ServiceProvider
{
    // ... (laisse la méthode register comme elle est)

    public function boot(): void
    {
        // 👇 AJOUTE CE BLOC 👇
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
    }
}
