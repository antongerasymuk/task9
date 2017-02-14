<?php

namespace common\widgets;

use Yii;
use yii\base\Widget;

class InformColumn extends Widget
{
  
    public $mainImage = '';
    public $title = 'title';
    public $content = 'content';
    private $imageClass = 'flash-on';

    public function init() {
        parent::init();
    }

    public function run() {
        if ($this->mainImage) {

            if ($this->mainImage == 'flash') {
               $this->imageClass = 'mdi-image-flash-on';
            }
            
            if ($this->mainImage == 'social') {
               $this->imageClass = 'mdi-social-group';
            }
            
            if ($this->mainImage == 'settings') {
               $this->imageClass = 'mdi-action-settings';
            }
        }
        return $this->render('informColumn',
            [
                'imageClass' => $this->imageClass,
                'title' => $this->title,
                'content' => $this->content
            ]);
    }
}
