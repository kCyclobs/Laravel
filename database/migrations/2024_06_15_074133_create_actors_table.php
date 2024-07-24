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
        Schema::create('actors', function (Blueprint $table) {
            $table->id();
            $table->string('actor_name');
            $table->string('gender');
            $table->Integer('age');
            $table->string('Date_of_Birth');
            $table->string('Nationality');
            $table->enum('occupation',['Actor','Actress']);
            $table->string('photo')->nullable();
            $table->timestamps();
        });


        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actors');
    }
};
