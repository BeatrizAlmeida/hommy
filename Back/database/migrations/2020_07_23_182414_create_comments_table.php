<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
			$table->text('text');
			$table->float('rating');
			$table->unsignedBigInteger('tenant_id')->nullable();
			$table->unsignedBigInteger('republic_id');
            $table->timestamps();
        });
		
		Schema::table('comments', function (Blueprint $table) { //adicionando constraint foreign key
			$table->foreign('republic_id')->references('id')->on('republics')->onDelete('cascade');
			$table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('set null');

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
