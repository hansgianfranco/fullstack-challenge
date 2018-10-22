<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReviewsTable extends Migration {

	public function up()
	{
		Schema::create('reviews', function(Blueprint $table) {
			$table->increments('id');
			$table->date('review_date');
			$table->integer('employee_id')->unsigned();
			$table->tinyInteger('knowledge');
			$table->tinyInteger('relationship');
			$table->tinyInteger('initiative');
            $table->tinyInteger('productivity');
            $table->boolean('performance');
			$table->timestamps();
		});

        Schema::table('reviews', function(Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

	}

	public function down()
	{
		Schema::drop('reviews');

        Schema::table('reviews', function(Blueprint $table) {
            $table->dropForeign('reviews_employee_id_foreign');
        });

	}
}