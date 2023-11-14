<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndustryIdToJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jobs', function (Blueprint $table) {
            if(!Schema::hasColumn('jobs', 'industry_id')) {
                $table->unsignedBigInteger('industry_id')->nullable()->after('company_id');
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
            if(Schema::hasColumn('jobs', 'industry_id')) {
                $table->dropColumn('industry_id');
            }
        });
    }
}
