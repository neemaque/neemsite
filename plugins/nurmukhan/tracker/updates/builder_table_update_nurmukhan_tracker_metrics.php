<?php namespace Nurmukhan\Tracker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNurmukhanTrackerMetrics extends Migration
{
    public function up()
    {
        Schema::table('nurmukhan_tracker_metrics', function($table)
        {
            $table->integer('max_value')->default(10);
        });
    }
    
    public function down()
    {
        Schema::table('nurmukhan_tracker_metrics', function($table)
        {
            $table->dropColumn('max_value');
        });
    }
}
