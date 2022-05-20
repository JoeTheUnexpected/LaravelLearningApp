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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('body');
            $table->unsignedInteger('price');
            $table->unsignedInteger('old_price')->nullable();
            $table->text('salon')->nullable();
            $table->string('kpp');
            $table->unsignedInteger('year');
            $table->string('color');
            $table->boolean('is_new')->default(false);
            $table->foreignId('car_body_id')->nullable()->constrained();
            $table->foreignId('car_class_id')->nullable()->constrained();
            $table->foreignId('car_engine_id')->nullable()->constrained();
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
        Schema::dropIfExists('cars');
    }
};
