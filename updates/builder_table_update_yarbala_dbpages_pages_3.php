<?php namespace Yarbala\DbPages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateYarbalaDbpagesPages3 extends Migration
{
    public function up()
    {
        Schema::table('yarbala_dbpages_pages', function($table)
        {
            $table->integer('parent_id')->nullable()->unsigned();
            $table->integer('nest_left')->nullable()->unsigned();
            $table->integer('nest_right')->nullable()->unsigned();
            $table->integer('nest_depth')->nullable()->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('yarbala_dbpages_pages', function($table)
        {
            $table->dropColumn('parent_id');
            $table->dropColumn('nest_left');
            $table->dropColumn('nest_right');
            $table->dropColumn('nest_depth');
        });
    }
}
