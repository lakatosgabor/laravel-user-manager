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
        Schema::create('user_descriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('descriptor_id')->comment('A leírást megadó felhasználó azonosítója');
            $table->integer('user_id')->comment('A felhasználó azonosítója');
            $table->text('description')->comment('A felhasználó jellemzése');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_descriptions');
    }
};
