<?php namespace Nurmukhan\Tracker\Models;

use Model;

/**
 * Model
 */
class Metric extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'nurmukhan_tracker_metrics';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $belongsTo = [
        'category' => 'Nurmukhan\Tracker\Models\Category'
    ];
    public $hasMany = [
        'logs' => 'Nurmukhan\Tracker\Models\Log'
    ];
    public function getCategoryIdOptions(){
        return \Nurmukhan\Tracker\Models\Category::lists('name', 'id');
    }
    public function getGraphData($start, $end)
    {
        $logs = $this->logs()
            ->whereBetween('recorded_at', [$start . ' 00:00:00', $end . ' 23:59:59'])
            ->orderBy('recorded_at', 'asc')
            ->get();

        return [
            'label' => "(" . $this->category->name . ") " . $this->name ,
            'hidden' => true,
            'data' => $logs->map(function($log) {
                return [
                    'x' => $log->recorded_at->toIso8601String(), 
                    'y' => $log->value * (10 / $this->max_value)
                ];
            })->toArray(),
            'borderColor' => $this->color,
            'tension' => 0,
            'yAxisID' => 'y'
        ];
    }
}
