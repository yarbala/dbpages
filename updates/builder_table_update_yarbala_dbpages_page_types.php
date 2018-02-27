<?php namespace Yarbala\DbPages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateYarbalaDbpagesPageTypes extends Migration
{
    public function up()
    {
        Schema::table('yarbala_dbpages_page_types', function($table)
        {
            $table->text('content');
            $table->dropColumn('key');
            $table->dropColumn('control');
        });
    }
    
    public function down()
    {
        Schema::table('yarbala_dbpages_page_types', function($table)
        {
            $table->dropColumn('content');
            $table->string('key', 255);
            $table->string('control', 255);
        });
    }
}
