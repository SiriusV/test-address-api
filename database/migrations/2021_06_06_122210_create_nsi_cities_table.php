<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNsiCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nsi_cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->foreignId('nsi_country_id')->constrained()->cascadeOnDelete();
            $table->foreignId('nsi_province_id')->constrained()->cascadeOnDelete();
            $table->foreignId('nsi_province_district_id')->constrained()->cascadeOnDelete();

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
        Schema::dropIfExists('nsi_cities');
    }
}
