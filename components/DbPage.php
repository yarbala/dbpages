<?php namespace Yarbala\DbPages\Components;

use Cms\Classes\ComponentBase;
use Yarbala\DbPages\Models\Page as ModelPage;
use Response;

class DbPage extends ComponentBase
{
    protected $page = null;

    public function componentDetails()
    {
        return [
            'name' => 'DB Page',
            'description' => 'Displays page.'
        ];
    }

    public function init()
    {
        $url = $this->controller->getRouter()->getUrl();
        $this->page = ModelPage::whereUrl($url)->first();
    }

    public function onRun()
    {
        if (is_null($this->page)) {
            return Response::make('Page not found', 404);
        }
    }

    // This array becomes available on the page as {{ dbPage.content }}
    public function content()
    {
        if ($this->page->type->source_type == 'content') {
            $content = [];
            foreach($this->page->content as $contentBlock) {
                $keyName = $contentBlock['content_key'];
                $varName = 'content_' . $contentBlock['content_type'];
                $content[$keyName] = $contentBlock[$varName];
            }
            return $content;
        } else {
            return $this->page->content;
        }
    }
}