<?php namespace Yarbala\DbPages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateYarbalaDbpagesPageTypes2 extends Migration
{
    public function up()
    {
        Schema::table('yarbala_dbpages_page_types', function($table)
        {
            $table->string('source_type');
            $table->string('config_file')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('yarbala_dbpages_page_types', function($table)
        {
            $table->dropColumn('source_type');
            $table->dropColumn('config_file');
        });
    }
}
