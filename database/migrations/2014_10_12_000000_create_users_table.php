<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->string('nama_gambar')->default("empty.jpg");
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->integer('peran')->default(3);
			$table->timestamps();
		});

		$user = new User;
		$user->nama = "Ridwan Kamil";
		$user->email = "rk@gmail.com";
		$user->password= "1";
		$user->peran = 1;
		$user->save();

		$user2 = new User;
		$user2->nama = "Daniar Heri";
		$user2->email = "daniar.h.k@gmail.com";
		$user2->password= "1";
		$user2->peran = 2;
		$user2->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
