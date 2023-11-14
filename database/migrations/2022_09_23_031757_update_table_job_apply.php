<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableJobApply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('job_apply', function (Blueprint $table) {
            $table->integer('seen')->default(0)->after('salary_currency');
            $table->integer('status')->default(1)->after('seen');
            $table->text('note')->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('job_apply', function (Blueprint $table) {
            $table->integer('seen');
            $table->integer('status');
            $table->text('note');
        });
    }
}
