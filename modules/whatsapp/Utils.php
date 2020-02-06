<?php 
namespace Whatsapp;

use Base\Base;
use Monolog\Logger;

class Utils extends Base
{
    function getUrl($countryCode,$phone)
    {
        new Logger($this->getConfig("Logger")['module_log']);
        $phone_number_only = preg_replace("/[^0-9]/", "", $countryCode.$phone);

        if(!$phone_number_only)
        {
            $error = UE_INVALID_PHONE;
            throw new \Exception($error);
        }
        
        $phone = $phone_number_only;
        
        $text = urlencode($_GET['text']);
        
        $api = "api";
        
        if($this->isMobile)
        {
            $api = "web";
        }
        return 'https://'.$api.'.whatsapp.com/send?phone='.$phone.'&text='.$text;
    }
}