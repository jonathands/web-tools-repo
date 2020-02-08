<?php 
namespace Whatsapp;

use Base\Base;

class Utils extends Base
{
    function getUrl($countryCode,$phone,$text="")
    {     
        $phone_number_only = preg_replace("/[^0-9]/", "", $countryCode.$phone);
        $this->log("Linking phone: ".$phone_number_only);
        
        if(!$phone_number_only)
        {
            $error = UE_INVALID_PHONE;
            throw new \Exception($error);
        }
        
        $phone = $phone_number_only;
        
        $api = "api";
        
        if($this->isMobile)
        {
            $api = "web";
        }

        $link = 'https://'.$api.'.whatsapp.com/send?phone='.$phone.'&text='.$text;
        $this->log("Linking phone: ".$phone_number_only.": final link ".$link);
        
        return $link;
    }
}