<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->date('birthday');
            $table->enum('sex', ['male', 'female']);
            $table->string('country');
            $table->string('city');
//            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tiny_about')->nullable();
            $table->boolean('car')->nullable();
            $table->enum('lookfor', ['male', 'female', 'none'])->default('none');
            $table->enum('children', ['yes', 'no', 'together', 'apart', 'none'])->default('none');
            $table->enum('marital', ['yes', 'no', 'together', 'none'])->default('none');
            $table->enum('education', ['no', 'HighSchool', 'HigherEducationUniversity', 'MDPhD', 'none'])->default('none');

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
        Schema::dropIfExists('users');
    }
}
