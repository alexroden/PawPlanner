<?php

/*
 * This file is part of PawPlanner.
 *
 * (c) Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Exceptions\Http;

use Exception;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * This is the missing data exception class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class MissingDataException extends BadRequestHttpException implements HttpExceptionInterface
{
    /**
     * Create a new missing dataexception instance.
     *
     * @param string     $messages
     * @param \Exception $previous
     * @param int        $code
     *
     * @return void
     */
    public function __construct($message = null, Exception $previous = null, $code = 0)
    {
        if (!$message) {
            $message = 'Missing data.';
        }

        parent::__construct($message, $previous, $code);
    }
}
