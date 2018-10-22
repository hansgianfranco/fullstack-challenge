<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmployeesTable extends Migration {

    public function up()
    {
        Schema::create('employees', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->integer('gender_id')->unsigned();
            $table->date('since');
            $table->string('position');
            $table->integer('division_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('employees', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('employees', function(Blueprint $table) {
            $table->foreign('gender_id')->references('id')->on('genders')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('employees', function(Blueprint $table) {
            $table->foreign('division_id')->references('id')->on('divisions')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::drop('employees');

        Schema::table('employees', function(Blueprint $table) {
            $table->dropForeign('employees_user_id_foreign');
        });
        Schema::table('employees', function(Blueprint $table) {
            $table->dropForeign('employees_gender_id_foreign');
        });
        Schema::table('employees', function(Blueprint $table) {
            $table->dropForeign('employees_division_id_foreign');
        });
    }
}