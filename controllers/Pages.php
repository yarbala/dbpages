<?php namespace Yarbala\DbPages\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Yarbala\DbPages\Models\Page;
use Yarbala\DbPages\Models\PageType;
use Request;
use Backend\Classes\BackendController;

class Pages extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController'];
    
    public $listConfig = 'config_list.yaml';
//    public $formConfig = '~/plugins/yarbala/dbpages/controllers/pages/config_form.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'manage_db_pages' 
    ];

    protected $pageType = null;

    public function __construct()
    {

        $action = BackendController::$action;
        if ($action == 'create') {
            $typeId = (int)Request::input('page_type_id', 0);

            if ($typeId > 0) {
                $this->pageType = PageType::find($typeId);
            }
        } else if ($action == 'update') {
            $params = BackendController::$params;
            $page = Page::find($params[0]);
            $this->pageType = $page->type;
        }

        if (!is_null($this->pageType) && $this->pageType->source_type == 'config') {
            $this->formConfig = '~/' . $this->pageType->config_file;
        }


        parent::__construct();

        $this->vars['pageTypes'] = PageType::all();

        BackendMenu::setContext('Yarbala.DbPages', 'main-menu-item', 'side-menu-item');
    }

    public function formExtendModel($model)
    {
        if (!is_null($this->pageType)) {
            $model->type = $this->pageType;
        }

        return $model;
    }

}