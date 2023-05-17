<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name',50)->nullable();
            $table->text('description')->nullable();
            //  $table->foreignId('categories_id')->nullable()->constrained('categories');
            //  $table->foreignId('genres_id')->nullable()->constrained('genres');
          
             $table->foreignId('categories_id')->nullable()->constrained()->references('id')->on('categories');
             $table->foreignId('genres_id')->nullable()->constrained()->references('id')->on('genres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
