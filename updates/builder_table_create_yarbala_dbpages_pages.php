<?php namespace Yarbala\DbPages\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateYarbalaDbpagesPages extends Migration
{
    public function up()
    {
        Schema::create('yarbala_dbpages_pages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->boolean('enabled');
            $table->string('url');
            $table->string('title');
            $table->text('content')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('yarbala_dbpages_pages');
    }
}
