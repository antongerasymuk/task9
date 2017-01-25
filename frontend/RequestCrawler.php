<?php
namespace frontend;
use yii\base\Component;
 
class RequestCrawler extends Component
{
    public $path;
    public $serialize;
     
    public function __construct(SerializeInterface $serialize, $config = [])
    {
        $this->serialize = $serialize;
        parent::__construct($config);
    }

}
