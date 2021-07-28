<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->bigIncrements('citizen_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->enum('marital_status', [1,2,3,4])->comment('1->single, 2->married, 3->widowed, 4->divorced');
            $table->string('guardian_cnic');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->unsignedBigInteger('family_number_id');
            $table->string('passcode')->unique();
            $table->enum('added_by', [1,2,3])->comment('1 for admin, 2 for vaccination center and 3 for self registration');
            $table->unsignedBigInteger('added_by_id')->nullable();
            $table->timestamps();
            $table->boolean('is_vaccinated');

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('added_by_id')->references('user_id')->on('users');
            $table->foreign('family_number_id')->references('family_number_id')->on('family_numbers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citizens');
    }
}
