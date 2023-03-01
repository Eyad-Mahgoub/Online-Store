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
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_category')
                  ->constrained('category', 'id')
                  ->nullable();
            $table->string('name', 30);
            $table->string('short_description', 255);
            $table->string('description');
            $table->string('slug', 20);
            $table->string('meta_title', 20);
            $table->string('meta_keywords');
            $table->string('meta_description', 255);
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
        Schema::dropIfExists('category');
    }
};
