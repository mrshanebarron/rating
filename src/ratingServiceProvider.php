<?php

namespace MrShaneBarron\rating;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\rating\Livewire\rating;
use MrShaneBarron\rating\View\Components\rating as Bladerating;
use Livewire\Livewire;

class ratingServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-rating.php', 'ld-rating');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-rating');

        Livewire::component('ld-rating', rating::class);

        $this->loadViewComponentsAs('ld', [
            Bladerating::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ld-rating.php' => config_path('ld-rating.php'),
            ], 'ld-rating-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/ld-rating'),
            ], 'ld-rating-views');
        }
    }
}
