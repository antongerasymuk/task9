<?php
namespace frontend\service;
use yii\base\Component;
 
class RequestCrawler extends Component
{
    
    public $serialize;
     
    public function __construct(SerializeInterface $serialize, $config = [])
    {
        $serialize->path = $config['path'];
        $this->serialize = $serialize;
        parent::__construct();
    }

}
