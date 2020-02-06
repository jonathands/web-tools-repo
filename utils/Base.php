<?php 
namespace base;

use Mobile_Detect;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

define("UE_INVALID_PHONE"," numero de telefone invalido");
class Base
{
    protected $isMobile;
    protected $isWebservice;
    protected $logger;
    private $confs;

    public function __construct()
    {       
        $this->bootConfs();
        $this->bootErrorI18n();
        $this->bootErrorHandling(); 
    }

    protected function getConfig($index)
    {
       return $this->confs[$index];
    }

    protected function log($log,$level = 0)
    {
        switch($level)
        {
            case 0:
                $this->logger->info($log);
            break;

            case 1:
                $this->logger->warning($log);
            break;
            
            case 2:
                $this->logger->warning($log);
            break;
        }
    }

    /* bootstrapping */
    private function bootConfs()
    {
        $this->isMobile = true;
        $this->isWebservice = false;
        /*TODO DEFINE WS FLAG*/

        $detect = new Mobile_Detect();
 
        if (!$detect->isMobile()) {
            $this->isMobile = false;
        }
        
        $this->confs = BASE_SYS_CONFS_LOADED;
    }

    private function bootErrorI18n()
    {
        
    }

    private function bootErrorHandling()
    {
        //setup Log
        $logName = $this->getConfig("logger")['module_log'];
        $this->logger = new Logger($logName);


        //setup error handling
        set_error_handler(array($this, 'errorHandler'));
        set_exception_handler(array($this, 'errorHandler'));
        register_shutdown_function(array($this, 'errorHandler'));
    }

    public function errorHandler()
    {
        $output = "";
        if(!$this->isWebservice)
        {
            $output .= "<pre>";
        }

        $error = error_get_last();
        $output .= "Error ".$error['args']['1'].
                   "found on line: ".$error['line'].
                   " of File > ".$error['file'].
                   " Class > ".$error['class'].
                   " Function > ".$error['function'].PHP_EOL;

        $output .= var_export(debug_backtrace(),true);

        $this->log($output,2);

        if(!$this->isWebservice)
        {
            $output .= "</pre>";
            $output = nl2br($output);
        }

        print($output);
    }
}