<?php namespace Yarbala\DbPages;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Yarbala\DbPages\Components\DbPage' => 'dbPage'
        ];
    }

    public function registerSettings()
    {
    }
}
