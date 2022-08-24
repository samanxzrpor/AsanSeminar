<?php

namespace Database\Factories;

use Core\Traits\JalaliDate;
use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Webinar>
 */
class WebinarFactory extends Factory
{

    protected $model = Webinar::class;

    private array $status = [
        'pending',
        'performing' ,
        'finished' ,
        'cancelled'
    ];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title(),
            'description' => fake()->realText(),
            'status' => function() {
                foreach ($this->status as $state){
                    return $state;
                }
            },
            'price' => fake()->randomNumber(),
            'percentage_discount' => random_int(0 , 100),
            'can_use_discount' => Arr::random(['on' , 'off']),
            'show_all' => Arr::random(['on' , 'off']),
            'max_capacity' => random_int(1 , 300),
            'event_date' => JalaliDate::changeToJalali(fake()->date()),
            'user_id' => function (){
                return User::factory();
            }
        ];
    }
}
