<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name')->unique();
            $table->integer('sort');
            NestedSet::columns($table);
            $table->timestamps();
        });

        if (!Schema::hasColumn('cars', 'category_id')) {
            Schema::table('cars', function (Blueprint $table) {
                $table->foreignId('category_id')->constrained();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');

        if (Schema::hasColumn('cars', 'category_id')) {
            Schema::dropColumns('cars', ['category_id']);
        }
    }
};
