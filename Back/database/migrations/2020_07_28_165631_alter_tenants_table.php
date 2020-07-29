<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('tenants', function (Blueprint $table) {
            $table->unsignedBigInteger('republic_id')->nullable();
        });
        Schema::table('tenants', function (Blueprint $table) {
			$table->foreign('republic_id')->references('id')->on('republics')->onDelete('set null');       
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
