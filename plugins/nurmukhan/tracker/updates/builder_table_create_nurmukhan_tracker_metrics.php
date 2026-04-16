<?php namespace Nurmukhan\Tracker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNurmukhanTrackerMetrics extends Migration
{
    public function up()
    {
        Schema::create('nurmukhan_tracker_metrics', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('category_id')->unsigned()->default(0);
            $table->string('name');
            $table->string('type')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('nurmukhan_tracker_metrics');
    }
}
