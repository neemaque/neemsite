<?php namespace Nurmukhan\Tracker;

use Backend;
use System\Classes\PluginBase;

/**
 * Tracker Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Tracker',
            'description' => 'No description provided yet...',
            'author'      => 'Nurmukhan',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {

        return [
            'Nurmukhan\Tracker\Components\TrackerGraphComponent' => 'TrackerGraphComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'nurmukhan.tracker.some_permission' => [
                'tab' => 'Tracker',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {

        return [
            'tracker-categories' => [
                'label'       => 'Tracker Categories',
                'url'         => Backend::url('nurmukhan/tracker/categories'),
                'icon'        => 'icon-leaf',
                'permissions' => ['nurmukhan.tracker.*'],
                'order'       => 500,
            ],
            'tracker-metrics' => [
                'label'       => 'Tracker Metrics',
                'url'         => Backend::url('nurmukhan/tracker/metrics'),
                'icon'        => 'icon-leaf',
                'permissions' => ['nurmukhan.tracker.*'],
                'order'       => 500,
            ],
            'tracker-logs' => [
                'label'       => 'Tracker Logs',
                'url'         => Backend::url('nurmukhan/tracker/logs'),
                'icon'        => 'icon-leaf',
                'permissions' => ['nurmukhan.tracker.*'],
                'order'       => 500,
            ],
        ];
    }
}
