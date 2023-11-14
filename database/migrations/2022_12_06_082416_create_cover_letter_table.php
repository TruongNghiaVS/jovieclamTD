<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoverLetterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cover_letter', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('image_main', 255)->nullable();
            $table->string('image_thumbnail', 255)->nullable();
            $table->string('file_path', 255)->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('cover_letter');
    }
}
