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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['cancelled', 'pending', 'performing' , 'finished'])
                ->default('pending');//
            $table->unsignedFloat('meeting_duration');
            $table->boolean('has_record')
                ->default(false);
            $table->unsignedInteger('max_capacity');
            $table->timestamp('start_date')->nullable(); //
            $table->timestamp('event_date')->nullable(); //
            $table->foreignId('webinar_id')
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
        Schema::dropIfExists('meetings');
    }
};
