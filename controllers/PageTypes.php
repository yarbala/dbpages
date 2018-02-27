<?php namespace Yarbala\DbPages\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class PageTypes extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    protected $jsonable = ['content'];

    public $requiredPermissions = [
        'manage_db_page_types'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Yarbala.DbPages', 'main-menu-item', 'side-menu-page-types');
    }
}