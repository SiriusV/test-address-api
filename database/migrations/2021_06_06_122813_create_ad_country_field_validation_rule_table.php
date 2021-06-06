<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdCountryFieldValidationRuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_country_field_validation_rule', function (Blueprint $table) {
            $table->id();

            $table->foreignId('ad_country_field_id')->constrained()->cascadeOnDelete()->index('ad_cf_index');;
            $table->foreignId('ad_field_validation_rule_id')->constrained()->cascadeOnDelete()->index('ad_vr_index');

            $table->unique(['ad_country_field_id', 'ad_field_validation_rule_id'])->index('ad_cf_vr_index');

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
        Schema::dropIfExists('ad_country_field_validation_rule');
    }
}
