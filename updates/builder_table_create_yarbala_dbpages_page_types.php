<?php namespace Yarbala\DbPages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateYarbalaDbpagesPageTypes extends Migration
{
    public function up()
    {
        Schema::create('yarbala_dbpages_page_types', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title');
            $table->string('url_template');
            $table->string('source_type');
            $table->text('content');
            $table->string('config_file')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('yarbala_dbpages_page_types');
    }
}