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
        Schema::create('discount_codes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('discount_code');
            $table->unsignedInteger('amount');
            $table->boolean('is_active')
                ->default(true);
            $table->dateTime('start_date');
            $table->dateTime('expire_date');
            $table->unsignedInteger('discount_code_count');
            $table->enum('discount_type' , ['amount', 'percentage'])
                ->default('percentage');
            $table->foreignId('webinar_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnDelete();
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
        Schema::dropIfExists('descount_codes');
    }
};
