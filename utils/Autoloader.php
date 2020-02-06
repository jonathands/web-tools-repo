<?php
class Autoloader
{
    static function register($conf) {
        spl_autoload_register(function ($className,$conf) {
            try
            {
                array_push($conf["autoloader"]["directory"],__DIR__); //try to load class from root;

                foreach ($conf["autoloader"]["directory"] as $dir)
                {
                    if(file_exists($dir.$className . '.php'))
                    {
                        include $className . '.php';
                        return true;
                    }
                }
            } 
            catch(Exception $ex)
            {
                throw $ex;
            }
        });
    }
}