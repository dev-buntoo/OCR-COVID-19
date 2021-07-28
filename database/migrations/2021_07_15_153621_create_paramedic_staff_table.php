<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamedicStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paramedic_staff', function (Blueprint $table) {
            $table->bigIncrements('paramedic_staff_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->unsignedBigInteger('vaccination_center_id');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->enum('added_by', [1,2,3])->comment('1 for admin, 2 for vaccination center and 3 for self registration');
            $table->unsignedBigInteger('added_by_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('added_by_id')->references('user_id')->on('users');
            $table->foreign('vaccination_center_id')->references('vaccination_center_id')->on('vaccination_centers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paramedic_staff');
    }
}
