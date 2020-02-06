<?php 

class WhatappUtils extends base
{
    function getUrl($countryCode,$phone)
    {
        
        $phone_number_only = preg_replace("/[^0-9]/", "", $countryCode.$phone);

        if(!$phone_number_only)
        {
            $error = ;
            header('HTTP/1.0 500 '.$error);
            throw new Exception($error);
        }
        
        $phone = $phone_number_only;
        
        $text = urlencode($_GET['text']);
        
        $api = "api";
        
        $isMobile = (new Mobile_Detect())->isMobile();
        if(!$isMobile)
        {
            $api = "web";
        }
        return 'https://'.$api.'.whatsapp.com/send?phone='.$phone.'&text='.$text;
    }
}