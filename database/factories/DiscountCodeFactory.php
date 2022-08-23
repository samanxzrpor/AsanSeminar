<?php

namespace Database\Factories;

use Domain\DiscountCode\Models\DiscountCode;
use Domain\Webinar\Models\Webinar;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class DiscountCodeFactory extends Factory
{

    protected $model = DiscountCode::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title(),
            'discount_code' => Str::random(8),
            'is_active' => random_int(0 , 1),
            'start_date' => now()->addDays(random_int(0 , 20)),
            'expires_date' => now()->addDays(30),
            'discount_code_count' => random_int(1 , 500),
            'discount_type' => Arr::random(['percentage', 'amount']),
            'webinar_id' => fn() => Webinar::factory(),
        ];
    }
}
