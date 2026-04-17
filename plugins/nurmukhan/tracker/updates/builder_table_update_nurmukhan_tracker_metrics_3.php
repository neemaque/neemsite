<?php namespace Nurmukhan\Tracker\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateNurmukhanTrackerMetrics3 extends Migration
{
    public function up()
    {
        Schema::table('nurmukhan_tracker_metrics', function($table)
        {
            $table->string('color')->default('#6366f1');
        });
    }
    
    public function down()
    {
        Schema::table('nurmukhan_tracker_metrics', function($table)
        {
            $table->dropColumn('color');
        });
    }
}
