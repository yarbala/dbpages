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
            $table->boolean('locked');
            $table->integer('type_id')->nullable()->unsigned();
            $table->string('url');
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_other');
            $table->integer('parent_id')->nullable()->unsigned();
            $table->integer('nest_left')->nullable()->unsigned();
            $table->integer('nest_right')->nullable()->unsigned();
            $table->integer('nest_depth')->nullable()->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('type_id')->references('id')
                ->on('yarbala_dbpages_page_types')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('parent_id')->references('id')
                ->on('yarbala_dbpages_pages')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('yarbala_dbpages_pages');
    }
}