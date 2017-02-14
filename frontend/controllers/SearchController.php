<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\httpclient\Client;


class SearchController extends Controller
{
    
    public function actionByCurl($s)
    {
        
        $search = $s;

        $sURL = "https://api.cognitive.microsoft.com/bing/v5.0/search?q=".urlencode($search)."&count=10";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $sURL); 
        //curl_setopt($ch, CURLOPT_TIMEOUT, '1'); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: multipart/form-data',
            'Ocp-Apim-Subscription-Key: '.\Yii::$app->params['bing_api_key']
            ));

        $content = curl_exec($ch);
       
        $response = json_decode($content,true);
       
        var_dump($response['relatedSearches']['value']);
        exit;
  
    }

    public function actionByHttpclient($s)
    {
  
        $search = $s;
        $client = new Client();
        $response = $client->createRequest()
        ->setMethod('get')
        ->setUrl('https://api.cognitive.microsoft.com/bing/v5.0/search?q='.urlencode($search).'&count=10')
        ->addHeaders(['Content-Type' => 'multipart/form-data', 'Ocp-Apim-Subscription-Key' => \Yii::$app->params['bing_api_key']])
        ->send();
        
        var_dump($response->data['relatedSearches']['value']);
        exit;
        
    }

}
