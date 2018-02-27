<?php namespace Yarbala\DbPages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateYarbalaDbpagesPages2 extends Migration
{
    public function up()
    {
        Schema::table('yarbala_dbpages_pages', function($table)
        {
            $table->integer('type_id')->nullable()->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('yarbala_dbpages_pages', function($table)
        {
            $table->dropColumn('type_id');
        });
    }
}
