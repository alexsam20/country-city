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
        Schema::create('regions', function (Blueprint $table) {
            $table->mediumInteger('id', true)->unsigned();
            $table->string('name', 10);
            $table->text('translations')->nullable();
            $table->timestamps();
            $table->tinyInteger('flag')->default(1);
            $table->string('wikiDataId', 10)->nullable()->comment('Rapid API GeoDB Cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};
