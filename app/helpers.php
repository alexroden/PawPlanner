<?php

/*
 * This file is part of PawPlanner.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!function_exists('elixir_safe')) {
    /**
     * Custom elixir code.
     *
     * @param string $file
     *
     * @return string
     */
    function elixir_safe($file)
    {
        if (file_exists(public_path('build/rev-manifest.json'))) {
            return elixir($file);
        } else {
            return $file;
        }

        throw new InvalidArgumentException("File {$file} not defined in asset manifest.");
    }
}
