<?php

namespace Domain\Webinar\DataTransferObjects;

use Core\Traits\JalaliDate;

class WebinarData
{
    use JalaliDate;

    public string $title;

    public string $description;

    public int $price;

    public int $discount;

    public bool $can_use_discount;

    public bool $show_all;

    public int $max_capacity;

    public string $event_date;

    public  string $status;

//    public function __construct(array $args)
//    {
//        parent::__construct($args);
//    }

    public function getStoreRequest(StoreWebinarRequest $request)
    {
        return new self([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'discount' => $request->get('discount'),
            'can_use_discount' => $request->get('can_use_discount'),
            'show_all' => $request->get('show_all'),
            'max_capacity' => $request->get('max_capacity'),
            'event_date' => $this->changeToCarbon($request->get('event_date'))
        ]);
    }
}
