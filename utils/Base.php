<?php 
namespace base;

use Mobile_Detect;
use utils;

define("UE_INVALID_PHONE"," numero de telefone invalido");
class Base
{
    protected $isMobile;
    private $confs;

    public function __construct()
    {       
        $this->bootConfs();
        $this->bootErrorI18n();
        $this->bootErrorHandling(); 
    }

    public function getConf($index)
    {
        $this->confs[$index];
    }

    private function bootConfs()
    {
        $this->isMobile = true;
        $detect = new Mobile_Detect();
 
        if (!$detect->isMobile()) {
            $this->isMobile = false;
        }

        $confs = BASE_SYS_CONFS_LOADED;
    }

    private function bootErrorI18n()
    {
        
    }

    private function bootErrorHandling()
    {
        
    }
}