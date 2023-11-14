<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('company_id');
            $table->integer('job_id');
            $table->integer('functional_area_id');
            $table->string('person_in_charge')->nullable();
            $table->tinyInteger('short_listed_status')->nullable();
            $table->tinyInteger('interview_status')->nullable();
            $table->tinyInteger('interview_type')->nullable();
            $table->tinyInteger('interview_round')->nullable();
            $table->dateTime('interview_plan_date');
            $table->dateTime('interview_actual_date')->nullable();
            $table->tinyInteger('offer_status')->nullable();
            $table->tinyInteger('offer_type')->nullable();
            $table->tinyInteger('start_date_status')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->tinyInteger('probation_status')->nullable();
            $table->tinyInteger('sign_contract_status')->nullable();
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
        Schema::dropIfExists('interviews');
    }
}
