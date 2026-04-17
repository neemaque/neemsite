<?php namespace Nurmukhan\Tracker\Components;

use Cms\Classes\ComponentBase;
use Nurmukhan\Tracker\Models\Metric;
use Nurmukhan\Tracker\Models\Category;


class TrackerGraphComponent extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'TrackerGraphComponent',
            'description' => ''
        ];
    }
    public function onRun() {
        $this->page['chartData'] = $this->prepareChartData();
    }
    public function onUpdateChart() {
        return ['chartData' => json_decode($this->prepareChartData())];
    }

    protected function prepareChartData() {
        $start = post('start', date('Y-m-d', strtotime('-7 days')));
        $end = post('end', date('Y-m-d'));

        $metrics = Metric::all();
        $categories = Category::all();

        $datasets = $metrics->map(function($metric) use ($start, $end) {
            return $metric->getGraphData($start, $end);
        });

        foreach ($categories as $category){
            $datasets->push($category->getDailyLogCount($start, $end));
        }
        
        return json_encode(['datasets' => $datasets]);
    }
}
