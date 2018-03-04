<?php

/*
 * This file is part of PawPlanner.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Foundation\Exceptions\Http\Filters;

use App\Exceptions\Http\HttpExceptionInterface;
use Exception;
use Illuminate\Http\Request;

/**
 * This is the api filter class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class HttpApiFilter
{
    /**
     * Filter and return the displayers.
     *
     * @param \GrahamCampbell\Exceptions\Displayers\DisplayerInterface[] $displayers
     * @param \Illuminate\Http\Request                                   $request
     * @param \Exception                                                 $original
     * @param \Exception                                                 $transformed
     * @param int                                                        $code
     *
     * @return \GrahamCampbell\Exceptions\Displayers\DisplayerInterface[]
     */
    public function filter(array $displayers, Request $request, Exception $original, Exception $transformed, $code)
    {
        if ($original instanceof HttpExceptionInterface) {
            foreach ($displayers as $index => $displayer) {
                if (!str_contains($displayer->contentType(), 'application/')) {
                    unset($displayers[$index]);
                }
            }
        }

        return array_values($displayers);
    }
}
