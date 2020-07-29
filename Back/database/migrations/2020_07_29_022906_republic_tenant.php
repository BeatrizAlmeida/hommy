<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RepublicTenant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('republic_tenant', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('tenant_id')->nullable();
			$table->unsignedBigInteger('republic_id')->nullable();
            $table->timestamps();
        });
		
		Schema::table('republic_tenant', function (Blueprint $table) { //adicionando constraint foreign key
			
			$table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
			$table->foreign('republic_id')->references('id')->on('republics')->onDelete('cascade');

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
