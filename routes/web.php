<?php

/*
 * This file is part of PawPlanner.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

Route::get('/', ['as' => 'index', 'uses' => 'AppController@index']);
Route::get('/register', ['as' => 'auth.register', 'uses' => 'AuthController@register']);
