<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('geoname_id')->unsigned();

            $table->string('iso', 2);
            $table->string('iso3', 2);
            $table->string('iso_numeric', 8)->nullable();
            $table->string('fips', 2);
            $table->string('name', 60);
            $table->string('capital', 200)->nullable();
            $table->decimal('area',16,3)->unsigned()->nullable();
            $table->integer('population')->unsigned()->nullable();
            $table->string('continent', 5);
            $table->string('tld', 8); // ????
            $table->string('currency_code', 20)->nullable();
            $table->string('currency_name', 50)->nullable();
            $table->string('phone_country_code', 8)->nullable();
            $table->string('postal_code_format', 20)->nullable();
            $table->string('postal_code_regex', 60)->nullable();
            $table->string('languages', 200)->nullable();
            $table->string('neighbours', 200)->nullable();
            $table->string('equivalent_fips_code', 50)->nullable();

            $table->index(['geoname_id', 'iso']);
            $table->index('geoname_id');
            $table->index('iso');
            $table->index('name');

            $table->unique('iso');
            $table->unique('iso3');
            $table->unique('iso_numeric');
            $table->unique('name');

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
//        $table->dropUnique('countries_iso_unique');
//        $table->dropUnique('countries_iso3_unique');
//        $table->dropUnique('countries_iso3_unique');
//        $table->dropUnique('countries_name_unique');
        Schema::drop('countries');
    }

}
