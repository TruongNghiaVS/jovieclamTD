<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsedForToSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->tinyInteger('used_for')->after('is_active')->default(0);
            $table->string('slider_image_mobile')->after('slider_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sliders', function (Blueprint $table) {
            if(Schema::hasColumn('sliders', 'used_for')) {
                $table->dropColumn('used_for');
            }
            if(Schema::hasColumn('sliders', 'slider_image_mobile')) {
                $table->dropColumn('slider_image_mobile');
            }
        });
    }
}
