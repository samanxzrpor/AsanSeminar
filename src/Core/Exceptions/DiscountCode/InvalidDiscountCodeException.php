<?php

namespace Core\Exceptions\DiscountCode;

use Exception;
use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

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
