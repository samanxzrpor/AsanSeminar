<?php

namespace Database\Factories;

use Domain\DiscountCode\Models\DiscountCode;
use Domain\Orders\Models\Order;
use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class OrderFactory extends Factory
{

    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status' => Arr::random(['paid', 'doing', 'unsuccessful']),
            'discount_code_id' => fn() => DiscountCode::factory(),
            'user_id' => fn() => User::factory(),
            'webinar_id' => fn() => Webinar::factory(),
        ];
    }
}
