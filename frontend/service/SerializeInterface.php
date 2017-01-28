<?php
namespace frontend\service;

interface SerializeInterface
{
	
	public function encodeAndSave(\yii\web\Request $request);
} 
