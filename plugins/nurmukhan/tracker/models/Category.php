<?php namespace Nurmukhan\Tracker\Models;

use Model;

/**
 * Model
 */
class Category extends Model
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
    public $table = 'nurmukhan_tracker_categories';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $hasMany = ['metrics' => 'Nurmukhan\Tracker\Models\Metric'];
    
    public function getDailyLogCount($start, $end)
    {
        $logCounts = $this->metrics->first()->logs()
            ->whereBetween('recorded_at', [$start . ' 00:00:00', $end . ' 23:59:59'])
            ->selectRaw('DATE(recorded_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date');

        $period = \Carbon\CarbonPeriod::create($start, $end);

        $dataPoints = [];
        foreach ($period as $date) {
            $dateString = $date->format('Y-m-d');
            
            $dataPoints[] = [
                'x' => $dateString,
                'y' => $logCounts->get($dateString, 0)
            ];
        }

        return [
            'label' => $this->name . ' logs a day',
            'hidden' => true,
            'data' => $dataPoints,
            'backgroundColor' => $this->color,
            'borderColor' => '#94a3b8',
            'type' => 'bar',
            'yAxisID' => 'y',
            'order' => 1
        ];
    }
}
