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
        Schema::create('directors', function (Blueprint $table) {
        $table->id();
        $table->string('director_name');
        $table->string('gender');
        $table->Integer('age');
        $table->string('Date_of_Birth');
        $table->string('Nationality');
        $table->string('occupation');
        $table->string('photo')->nullable();
        
        $table->timestamps();

        
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('directors');
    }
};
