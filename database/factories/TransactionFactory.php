<?php

namespace Database\Factories;

use Domain\Transaction\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class TransactionFactory extends Factory
{

    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'amount' => fake()->numberBetween(1000 , 100000000),
            'description' => fake()->realText(),
            'register_date' => now()->addDays(random_int(0 , 100)),
            'status' => Arr::random(['success', 'failed']),
            'type' => Arr::random(['buy , deposit' , 'refund'])
        ];
    }
}
