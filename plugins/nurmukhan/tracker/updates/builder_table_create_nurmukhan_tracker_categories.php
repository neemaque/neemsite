<?php namespace Nurmukhan\Tracker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNurmukhanTrackerCategories extends Migration
{
    public function up()
    {
        Schema::create('nurmukhan_tracker_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->string('name');
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('nurmukhan_tracker_categories');
    }
}
