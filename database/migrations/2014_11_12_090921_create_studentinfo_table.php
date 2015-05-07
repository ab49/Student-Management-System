<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentinfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('studentinfos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('student_id');
			$table->date('date');
			$table->char('sex', 6);
			$table->string('address');
			$table->string('fname');
			$table->string('description');
			$table->timestamps();
			
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return voi
	 */
	public function down()
	{
		Schema::drop('studentinfos');
	}

}
