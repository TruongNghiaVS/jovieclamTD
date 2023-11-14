<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailJobAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_job_alerts', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('token')->nullable();
            $table->tinyInteger('is_verified')->default(0);
            $table->tinyInteger('is_subscribed')->default(1);
            //$table->integer('job_id')->nullable();
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
        Schema::dropIfExists('email_job_alerts');
    }
}
