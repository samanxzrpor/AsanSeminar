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
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('price');
            $table->dateTime('event_date');
            $table->unsignedInteger('percentage_discount')
                ->default(0);
            $table->enum('status' , ['cancelled', 'pending' , 'performing' , 'finished'])
                ->default('pending');
            $table->enum('can_use_discount' , ['off', 'on'])
                ->default('off');
            $table->enum('show_all' , ['off', 'on'])
                ->default('off');
            $table->unsignedInteger('max_capacity');
            $table->foreignId('master_id')
                ->constrained('users')
                ->cascadeOnUpdate();
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
        Schema::dropIfExists('webinars');
    }
};
