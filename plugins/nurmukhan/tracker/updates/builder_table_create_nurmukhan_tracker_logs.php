<?php namespace Nurmukhan\Tracker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateNurmukhanTrackerLogs extends Migration
{
    public function up()
    {
        Schema::create('nurmukhan_tracker_logs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('metric_id');
            $table->integer('value');
            $table->text('notes')->nullable();
            $table->dateTime('recorded_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('nurmukhan_tracker_logs');
    }
}
