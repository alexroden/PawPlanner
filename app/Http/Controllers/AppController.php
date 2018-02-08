<?php

/*
 * This file is part of PawPlanner.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

/**
 * This is the app controller class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class AppController extends BaseController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return View::make('index');
    }
}
