<?php namespace Yarbala\DbPages\Models;

use Model;
use Request;
use October\Rain\Support\Str;

/**
 * Model
 */
class Page extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\NestedTree;
    
    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'yarbala_dbpages_pages';
    protected $jsonable = ['content', 'meta_other'];

    public $belongsTo = [
        'type' => ['Yarbala\DbPages\Models\PageType', 'key' => 'type_id']
    ];

    public function getContentAttribute()
    {
        if ($this->exists || is_null($this->type) || $this->type->source_type != 'content') {
            if (isset($this->attributes['content'])) {
                return $this->attributes['content'];
            } else {
                return '';
            }
        } else {

            return json_encode($this->type->content);
        }
    }

    public function filterFields($fields, $context = null)
    {
        if (isset($fields->url)) {
            $isLocked = isset($this->locked) ? $this->locked : false;
            $fields->url->readOnly = !$isLocked;
            if (!$isLocked && isset($this->type) && !is_null($this->type)) {
                $url = $this->type->url_template;

                if (isset($this->parent) && !is_null($this->parent)) {
                    $parentUrl = $this->parent->url;
                    $url = str_replace('{parent-url}', $parentUrl, $url);
                }

                if (isset($this->title) && !empty($this->title)) {
                    $url = str_replace('{title-slug}', Str::slug($this->title), $url);
                }


                $fields->url->value = trim($url, '/');
            }
        }



    }

}