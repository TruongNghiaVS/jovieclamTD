<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsSameCompanyAddToJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
        });

        if (!Schema::hasColumn('jobs', 'is_same_company_add')) {
            Schema::table('jobs', function (Blueprint $table)
            {
                $table->tinyInteger('is_same_company_add')->default(1);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumn('jobs', 'is_same_company_add')) {
            Schema::table('jobs', function (Blueprint $table)
            {
                $table->dropColumn('is_same_company_add');
            });
        }
    }
}
