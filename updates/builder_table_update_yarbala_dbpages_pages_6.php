<?php namespace Yarbala\DbPages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateYarbalaDbpagesPages6 extends Migration
{
    public function up()
    {
        Schema::table('yarbala_dbpages_pages', function($table)
        {
            $table->dropColumn('slug');
        });
    }
    
    public function down()
    {
        Schema::table('yarbala_dbpages_pages', function($table)
        {
            $table->string('slug', 255);
        });
    }
}
