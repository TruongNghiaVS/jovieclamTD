<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruiterSharedResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruiter_shared_resumes', function (Blueprint $table) {
            $table->id();
            $table->integer('cv_id');
            $table->string('full_name');
            $table->string('job_title');
            $table->string('cover_photo')->nullable();
            $table->string('summary');
            $table->tinyInteger('gender')->default(0);
            $table->tinyInteger('marital_status')->default(0);
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('nationality_id')->nullable();
            $table->string('address')->nullable();
            $table->dateTime('dob')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('website')->nullable();
            $table->string('path');
            $table->tinyInteger('draft')->default(0);
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
        Schema::dropIfExists('recruiter_shared_resumes');
    }
}
