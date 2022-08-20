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
            $table->enum('status' , ['cancelled', 'pending' , 'performing' , 'finished'])
                ->default('pending');
            $table->boolean('can_use_discount')
                ->default(false);
            $table->boolean('show_all')
                ->default(false);
            $table->unsignedInteger('max_capacity');
            $table->foreignId('user_id')
                ->constrained()
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
