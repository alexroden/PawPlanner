<?php

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
    public function __construct(array $messages = [], Exception $previous, $code= 0)
    {
        $errorMessage = '';
        if (empty($messages)) {
            $errorMessage = 'Validation failure.'
        } else {
            $messageCount = count($messages);

            foreach ($messages as $key => $message) {
                $errorMessage =. ($key + 1) < $count ? $messages.',' : $messages;
            }
        }

        parent::__construct($errorMessage, $previous, $code);
    }
}