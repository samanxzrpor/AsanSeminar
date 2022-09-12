<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['paid' , 'doing' , 'unsuccessful' , 'refund'])
                ->default('doing');
            $table->foreignId('discount_code_id')
                ->nullable()
                ->constrained('discount_codes');
            $table->foreignId('user_id')
                ->constrained();
            $table->foreignId('webinar_id')
                ->constrained();
            $table->foreignId('transaction_id')
                ->nullable()
                ->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
