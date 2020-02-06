<?php 
namespace base;

use Mobile_Detect;
use utils;

define("UE_INVALID_PHONE"," numero de telefone invalido");
class Base
{
    protected $isMobile;
    
    public function __construct()
    {       
        $this->bootConfs();
        $this->bootErrorI18n();
        $this->bootErrorHandling(); 
    }

    private function bootConfs()
    {
        $this->isMobile = true;
        $detect = new Mobile_Detect();
 
        if (!$detect->isMobile()) {
            $this->isMobile = false;
        }
    }

    private function bootErrorI18n()
    {
        
    }

    private function bootErrorHandling()
    {
        
    }
}