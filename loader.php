<?php
define("BASE_SYS_CONF",__DIR__.DIRECTORY_SEPARATOR."utils".DIRECTORY_SEPARATOR."confs.php");
$files["configurations"] = BASE_SYS_CONF;

if(!file_exists($files["configurations"]))
{
    throw new Exception("Essential files not found ".BASE_SYS_CONF."");
}
include $files["configurations"];
define("BASE_SYS_CONFS_LOADED",$confs);