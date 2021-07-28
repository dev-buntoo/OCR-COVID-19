<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinatedPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccinated_people', function (Blueprint $table) {
            $table->bigIncrements('vaccinated_people_id');
            $table->unsignedBigInteger('citizen_id');
            $table->unsignedBigInteger('vaccination_center_id');
            $table->unsignedBigInteger('paramedic_staff_id');
            $table->dateTime('vaccinated_date_time');
            $table->boolean('any_reaction');
            $table->string('reaction_detail');
            $table->timestamps();

            $table->foreign('citizen_id')->references('user_id')->on('users');
            $table->foreign('vaccination_center_id')->references('vaccination_center_id')->on('vaccination_centers');
            $table->foreign('paramedic_staff_id')->references('paramedic_staff_id')->on('paramedic_staff');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaccinated_people');
    }
}
