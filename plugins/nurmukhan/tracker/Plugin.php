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
        return []; // Remove this line to activate

        return [
            'Nurmukhan\Tracker\Components\MyComponent' => 'myComponent',
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
            'tracker' => [
                'label'       => 'Tracker',
                'url'         => Backend::url('nurmukhan/tracker/Categories'),
                'icon'        => 'icon-leaf',
                'permissions' => ['nurmukhan.tracker.*'],
                'order'       => 500,
            ],
        ];
    }
}
