<?php

namespace frontend\service;
use yii\base\Component;
 
class RequestCrawler extends Component
{
    
    public $serialize;
       
    public function __construct(SerializeInterface $serialize, $config = [])
    {
        $serialize->path = $config['path'];
        $serialize->component = $this;
        $this->serialize = $serialize;
       
        foreach ($config['events'] as $event => $handler) {
            $this->on($event, $handler);
        }
 
        parent::__construct();
    }
}
