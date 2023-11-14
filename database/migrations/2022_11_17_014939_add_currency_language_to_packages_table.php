<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurrencyLanguageToPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('packages', function (Blueprint $table) {
            if(!Schema::hasColumn('packages', 'currency')) {
                $table->string('currency')->default('vnd');
            }
            if(!Schema::hasColumn('packages', 'language')) {
                $table->string('language')->default('vi');
            }
            if(Schema::hasColumn('packages', 'package_price')) {
                $table->decimal('package_price',15,2)->change();
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
        Schema::table('packages', function (Blueprint $table) {
            if(Schema::hasColumn('packages', 'currency')) {
                $table->dropColumn('currency');
            }
            if(Schema::hasColumn('packages', 'language')) {
                $table->dropColumn('language');
            }
        });
    }
}
