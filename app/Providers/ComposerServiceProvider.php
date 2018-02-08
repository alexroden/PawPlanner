<?php

namespace App\Providers;

use App\Composers\UserComposer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;

/**
 * This is the composer service provider.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Boot the service porvider.
     *
     * @param \Illuminate\Contracts\View\Factory $factory
     *
     * @return void
     */
    public function boot(Factory $factory)
    {
        $factory->composer([
            'auth.register',
        ], UserComposer::class);
    }
}