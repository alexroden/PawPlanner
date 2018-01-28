<?php

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