<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCmsContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cms_content', function (Blueprint $table) {
            $table->string('page_slug', 255)->nullable()->after('page_title');
            $table->string('page_image', 255)->nullable()->after('page_slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cms_content', function (Blueprint $table) {
            $table->dropColumn(['slug']);
        });
    }
}
