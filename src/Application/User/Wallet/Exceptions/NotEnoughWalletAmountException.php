<?php

namespace Application\User\Wallet\Exceptions;

use Exception;

class NotEnoughWalletAmountException extends Exception
{

    public function __construct(string $message = "", int $code = 0)
    {
        parent::__construct($message, $code);
    }

    public function render()
    {
        // Determine if the exception needs custom reporting...
        return response([
            "error" => 'Wallet Amount Not Enough',
            "help" => $this->message
        ], 404);
    }
}
