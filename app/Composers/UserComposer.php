<?php

namespace App\Composers;

use App\Plan;
use Illuminate\View\View;

/**
 * This is the user composer.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class UserComposer
{
    /**
     * Bind data o the view.
     *
     * @param \Illuminate\Contracts\View\View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->withPlans(Plan::all());
    }
}