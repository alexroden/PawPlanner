<?php

/*
 * This file is part of PawPlanner.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Foundation\Providers;

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
