<?php
define("CONFNAME","confs.json.php");
define("LOADERNAME","autoloader.php");

$files["autoloader"] = __DIR__."utils".DIRECTORY_SEPARATOR.LOADERNAME;
$files["configurations"] = __DIR__."utils".DIRECTORY_SEPARATOR.CONFNAME;

if(!file_exists($files["autoloader"]) || !file_exists($files["configurations"]))
{
    throw new Exception("Essential files not found ".CONFNAME." or ".LOADERNAME."");
}

$confs = json_decode(file_get_contents($files["configurations"]));

if(!$confs)
{
    throw new Exception("Malformed json in confs.json.php");
}

include $files["autoloader"];
Autoloader::register($confs);
