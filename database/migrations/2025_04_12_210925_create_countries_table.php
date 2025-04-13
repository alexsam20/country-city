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
        Schema::create('countries', function (Blueprint $table) {
            
            $table->mediumInteger('id', true)->unsigned();
            $table->string('name', 50);
            $table->char('iso3',3)->nullable();
            $table->char('numeric_code',3)->nullable();
            $table->char('iso2',2)->nullable();
            $table->string('phonecode',20)->nullable();
            $table->string('capital',30)->nullable();
            $table->char('currency',3)->nullable();
            $table->string('currency_name',50)->nullable();
            $table->char('currency_symbol',6)->nullable();
            $table->char('tld',3)->nullable();
            $table->string('native',55)->nullable();
            $table->string('region',10)->nullable();
            $table->unsignedMediumInteger('region_id')->nullable();
            $table->string('subregion',30)->nullable();
            $table->unsignedMediumInteger('subregion_id')->nullable();
            $table->string('nationality',50)->nullable();
            $table->text('timezones')->nullable();
            $table->text('translations')->nullable();
            $table->decimal('latitude',10,8)->nullable();
            $table->decimal('longitude',11,8)->nullable();
            $table->string('emoji',191)->nullable();
            $table->string('emojiU',191)->nullable();
            $table->timestamps();
            $table->tinyInteger('flag')->default(1);
            $table->string('wikiDataId', 10)->nullable()->comment('Rapid API GeoDB Cities');
            $table->foreign('region_id')->references('id')->on('regions');
            $table->foreign('subregion_id')->references('id')->on('subregions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
