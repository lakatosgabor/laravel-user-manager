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
        Schema::create('base_characterizations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Jellemzés rövid neve');
            $table->text('characterization')->comment('Jellmezés definiciója');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_characterizations');
    }
};
