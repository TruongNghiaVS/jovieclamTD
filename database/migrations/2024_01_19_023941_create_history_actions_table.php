<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_actions', function (Blueprint $table) {
            $table->id();
            $table->string("content")->null();
            $table->integer('type')->null()->default(0);
            $table->integer('userId')->null();
            $table->string('link')->null();
            $table->string('title')->null();
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
        Schema::dropIfExists('history_actions');
    }
}
