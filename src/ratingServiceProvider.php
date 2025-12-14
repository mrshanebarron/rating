<?php

namespace MrShaneBarron\Rating;

use Illuminate\Support\ServiceProvider;

class RatingServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('sb-rating', Livewire\Rating::class);
        }
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-rating');
    }
}
