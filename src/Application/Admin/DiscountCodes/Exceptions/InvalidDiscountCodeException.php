<?php

namespace Application\Admin\DiscountCodes\Exceptions;

use Core\Exceptions\DiscountCode\Throwable;
use Exception;

class InvalidDiscountCodeException extends Exception
{

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render()
    {
        // Determine if the exception needs custom reporting...
        return response([
            "error" => 'The Discount Code is invalid',
            "help" => $this->message
        ], 404);
    }
}
