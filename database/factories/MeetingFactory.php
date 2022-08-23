<?php

namespace Database\Factories;

use Domain\Meeting\Models\Meeting;
use Domain\Webinar\Models\Webinar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class MeetingFactory extends Factory
{
    protected $model = Meeting::class;

    private array $status = [
        'pending' ,
        'performing' ,
        'cancelled' ,
        'finished'
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
            'meeting_duration' =>fake()->randomDigitNotNull,
            'has_record' => random_int(0 , 1),
            'max_capacity' => random_int(1 , 300),
            'start_date' => fake()->date(),
            'event_date' => fake()->date(),
            'webinar_id' => function (){
                return Webinar::factory();
            }
        ];
    }
}
