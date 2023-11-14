<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRefrestAtToJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            if(!Schema::hasColumn('jobs','refresh_at')) {
                $table->dateTime('refresh_at')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            if(Schema::hasColumn('jobs','refresh_at')) {
                $table->dropColumn(['refresh_at']);
            }
        });
    }
}
