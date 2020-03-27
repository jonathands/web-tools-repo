<?php
require_once __DIR__ . '..'.DIRECTORY_SEPARATOR.'loader.php';
require_once __DIR__ . '..'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use Whatsapp\Utils;

$WppUtils = new \Whatsapp\Utils();

echo $WppUtils->getUrl("55",$_GET['phone']);