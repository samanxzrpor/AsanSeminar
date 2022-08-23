<?php

namespace Database\Seeders;

use Domain\DiscountCode\Models\DiscountCode;
use Illuminate\Database\Seeder;

class DiscountCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiscountCode::factory(10)->create();
    }
}
