<?php

namespace Database\Seeders;

use Domain\DiscountCode\Models\DiscountCode;
use Domain\Orders\Models\Order;
use Domain\User\Models\User;
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
        $discount_code = DiscountCode::create([
            'title' => 'Discount Code' ,
            'code' => Str::random(8),
            'start_date' => now()->addDays(2),
            'expire_date' => now()->addDays(12),
            ''
        ]);
        $user = User::create([
            'name' => 'User n-' . $random = random_bytes(4),
            'email' => 'user-n'.$random.'@example.com' ,
            'phone' => '++98' . random_bytes(12),
            'password' => Hash::make('pass123456789'),
        ]);

        Order::create([

        ]);
    }
}
