<?php

namespace Application\Transaction\Exceptions;

use Exception;

class InvalidTransactionException extends Exception
{

    public function __construct(string $message = "", int $code = 0)
    {
        parent::__construct($message, $code);
    }

    public function render()
    {
        // Determine if the exception needs custom reporting...
        return response([
            "error" => 'The Transaction is invalid',
            "help" => $this->message
        ], 404);
    }
}
