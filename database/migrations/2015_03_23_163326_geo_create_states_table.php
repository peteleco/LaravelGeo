<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GeoCreateStatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('name',50);
            $table->char('iso_code',2)->nullable(); // Codigo do estado IBGE
            $table->char('iso_name',3)->nullable(); // Ex.: RJ, SP

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
        Schema::table('states',function(Blueprint $table){
            $table->dropForeign('states_country_id_foreign');
        });
        Schema::drop('states');
	}

}
