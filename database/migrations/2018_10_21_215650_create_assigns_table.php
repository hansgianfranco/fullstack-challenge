<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssignsTable extends Migration {

	public function up()
	{
		Schema::create('assigns', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('employee_id')->unsigned();
			$table->integer('assign_eid')->unsigned();
		});

        Schema::table('assigns', function(Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('assigns', function(Blueprint $table) {
            $table->foreign('assign_eid')->references('id')->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
	}

	public function down()
	{
		Schema::drop('assigns');

        Schema::table('assigns', function(Blueprint $table) {
            $table->dropForeign('assigns_employee_id_foreign');
        });
        Schema::table('assigns', function(Blueprint $table) {
            $table->dropForeign('assigns_assign_eid_foreign');
        });
	}
}