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
 * This is the validation failure exception class.
 *
 * @author Alex Broom-Roden <b.r_alex@hotmail.co.uk>
 */
class ValidationFailureException extends BadRequestHttpException implements HttpExceptionInterface
{
    /**
     * Create a new validation failure exception instance.
     *
     * @param array      $messages
     * @param \Exception $previous
     * @param int        $code
     *
     * @return void
     */
    public function __construct(array $messages = [], Exception $previous = null, $code = 0)
    {
        $errorMessage = '';
        if (empty($messages)) {
            $errorMessage = 'Validation failure.';
        } else {
            $count = count($messages);

            foreach ($messages as $key => $message) {
                $errorMessage .= ($key + 1) < $count ? $message.',' : $message;
            }
        }

        parent::__construct($errorMessage, $previous, $code);
    }
}
