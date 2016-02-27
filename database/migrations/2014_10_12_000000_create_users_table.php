<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
      $table->string('username')->unique();
      $table->string('password', 60);
      $table->string('firstname', 30);
      $table->string('lastname', 30);
      $table->string('email')->unique();
      $table->string('user_group', 2);
      $table->string('user_level', 1);
      $table->timestamp('last_loggedin');
      $table->enum('status',['active', 'suspended', 'pending'])->default('pending');
      $table->rememberToken();
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
    Schema::drop('users');
  }

}