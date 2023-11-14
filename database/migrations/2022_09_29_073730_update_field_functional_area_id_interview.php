<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFieldFunctionalAreaIdInterview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interviews', function (Blueprint $table) {
            $table->integer('functional_area_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interviews', function (Blueprint $table) {
            $table->dropColumn(['functional_area_id']);
        });
    }
}
