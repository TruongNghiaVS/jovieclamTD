<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileReferences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_references', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('ref_name', 255)->nullable();
            $table->string('ref_position', 255)->nullable();
            $table->string('ref_company', 255)->nullable();
            $table->string('ref_phone', 255)->nullable();
            $table->string('ref_email', 255)->nullable();
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
        Schema::dropIfExists('profile_references');
    }
}
