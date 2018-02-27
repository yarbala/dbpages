<?php namespace Yarbala\DbPages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateYarbalaDbpagesPageTypes3 extends Migration
{
    public function up()
    {
        Schema::table('yarbala_dbpages_page_types', function($table)
        {
            $table->string('url_template');
        });
    }
    
    public function down()
    {
        Schema::table('yarbala_dbpages_page_types', function($table)
        {
            $table->dropColumn('url_template');
        });
    }
}
