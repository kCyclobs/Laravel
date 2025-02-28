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
        Schema::create('movie_director_webs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("director_id");
            $table->unsignedBigInteger("movie_id");
            $table->timestamps();

            
            $table->foreign('director_id')->references('id')->on('directors');
            $table->foreign('movie_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_director_webs');
    }
};
