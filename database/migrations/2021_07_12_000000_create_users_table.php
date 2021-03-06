<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('user_id');
            $table->string('email')->unique();
            $table->string('cnic')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->enum('gender', [1,2,3])->comment('1 for male, 2 for female and 3 for other');
            $table->date('date_of_birth')->nullable();
            $table->string('password');
            $table->softDeletes();
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
