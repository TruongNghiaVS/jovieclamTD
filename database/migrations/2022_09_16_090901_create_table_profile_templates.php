<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProfileTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_templates', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('font_size', 255)->nullable();
            $table->string('name_template', 255)->nullable();
            $table->string('lang', 255)->nullable();
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
        Schema::dropIfExists('profile_templates');
    }
}
