<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruiterSharedCVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruiter_shared_cvs', function (Blueprint $table) {
            $table->id();
            $table->integer('recruiter_id');
            $table->string('name');
            $table->string('code');
            $table->string('word_path');
            $table->string('photo_path');
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
        Schema::dropIfExists('recruiter_shared_cvs');
    }
}
