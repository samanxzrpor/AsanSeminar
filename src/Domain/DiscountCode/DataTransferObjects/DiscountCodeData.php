<?php

namespace Domain\DiscountCode\DataTransferObjects;

class DiscountCodeData extends \Core\DataTransferObjects\DataTransferObject
{

    public string $title;
    public string $discount_code;
    public string $amount;
    public string $discount_code_count;
    public string $discount_type;
    public string $start_date;
    public string $expires_date;
    public string $webinar_id;
}
