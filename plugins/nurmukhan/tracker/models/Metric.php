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
}
