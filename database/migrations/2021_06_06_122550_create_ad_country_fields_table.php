<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdCountryFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_country_fields', function (Blueprint $table) {
            $table->id();
            $table->integer('order_number');
            $table->boolean('is_personal'); // является ли персональным в данной стране

            $table->foreignId('nsi_country_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ad_field_id')->constrained()->cascadeOnDelete();

            $table->unique(['nsi_country_id', 'ad_field_id']);

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
        Schema::dropIfExists('ad_country_fields');
    }
}
