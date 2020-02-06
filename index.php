<?php
use Whatsapp\Utils;
require_once __DIR__ . '..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
require_once __DIR__ . '..'.DIRECTORY_SEPARATOR.'loader.php';

$WppUtils = new \Whatsapp\Utils();

echo $WppUtils->getUrl("55","47989223305");