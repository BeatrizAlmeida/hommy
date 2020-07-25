<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republics', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->float('price')->unsigned();
			$table->mediumText('description');
			$table->integer('bedrooms')->unsigned();
			$table->integer('bathrooms')->unsigned();
			$table->integer('numberResidents')->unsigned();
			$table->string('street');
			$table->string('houseNumber');
			$table->string('neighborhood');
			$table->string('city');
			$table->unsignedBigInteger('tenant_id')->nullable();
			$table->unsignedBigInteger('locator_id');
            $table->timestamps();
        });
		
		Schema::table('republics', function (Blueprint $table) { //adicionando constraint foreign key
			
			$table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('set null');
			$table->foreign('locator_id')->references('id')->on('locators')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('republics');
    }
}
