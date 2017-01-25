<?php
namespace frontend;

interface SerializeInterface
{
	public function encode($array);
	public function decode($array);
	public function saveFile($string, $path);
} 
