<?php namespace Nurmukhan\Tracker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNurmukhanTrackerMetrics4 extends Migration
{
    public function up()
    {
        Schema::table('nurmukhan_tracker_metrics', function($table)
        {
            $table->boolean('is_cumulative')->default(false);
        });
    }
    
    public function down()
    {
        Schema::table('nurmukhan_tracker_metrics', function($table)
        {
            $table->dropColumn('is_cumulative');
        });
    }
}
