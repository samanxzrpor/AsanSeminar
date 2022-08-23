<?php

namespace Database\Seeders;

use Domain\DiscountCode\Models\DiscountCode;
use Domain\Orders\Models\Order;
use Domain\User\Models\User;
use Domain\Webinar\Models\Webinar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $discount_code = DiscountCode::factory()->create();
        $webinar = Webinar::factory()->create();
        $user = User::factory()->create();



        Order::create([

        ]);
    }
}
