<?php namespace Nurmukhan\Tracker\Models;

use Model;

/**
 * Model
 */
class Log extends Model
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
    public $table = 'nurmukhan_tracker_logs';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
    public $belongsTo = ['metric' => 'Nurmukhan\Tracker\Models\Metric'];

    public function beforeSave() {
        if (!$this->recorded_at) 
        {
            $this->recorded_at = now();
        }
    }
    public function getMetricIdOptions(){
        return \Nurmukhan\Tracker\Models\Metric::lists('name', 'id');
    }

    public $fillable=[
        'value',
        'metric_id',
    ];
    protected $dates = [
        'recorded_at'
    ];
}
