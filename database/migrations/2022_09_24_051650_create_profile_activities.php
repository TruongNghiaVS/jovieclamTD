<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileActivities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_activities', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('company', 255)->nullable();
            $table->string('role', 255)->nullable();
            $table->timestamp('date_start')->nullable();
            $table->timestamp('date_end')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_activities');
    }
}
