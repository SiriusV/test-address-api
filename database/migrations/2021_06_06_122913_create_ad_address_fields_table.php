<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdAddressFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_address_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ad_address_id')->constrained()->cascadeOnDelete();
            $table->foreignId('ad_country_field_id')->constrained()->cascadeOnDelete();

            $table->unique(['ad_address_id', 'ad_country_field_id']);

            $table->string('value')->nullable(); // для текстовых полей, например имени

            $table->nullableMorphs('field_value'); // для справочных полей

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
        Schema::dropIfExists('ad_address_fields');
    }
}
