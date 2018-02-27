<?php namespace Yarbala\DbPages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateYarbalaDbpagesPages5 extends Migration
{
    public function up()
    {
        Schema::table('yarbala_dbpages_pages', function($table)
        {
            $table->boolean('locked');
        });
    }
    
    public function down()
    {
        Schema::table('yarbala_dbpages_pages', function($table)
        {
            $table->dropColumn('locked');
        });
    }
}
