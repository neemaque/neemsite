<?php namespace Nurmukhan\Tracker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNurmukhanTrackerMetrics2 extends Migration
{
    public function up()
    {
        Schema::table('nurmukhan_tracker_metrics', function($table)
        {
            $table->integer('step_value')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('nurmukhan_tracker_metrics', function($table)
        {
            $table->dropColumn('step_value');
        });
    }
}
