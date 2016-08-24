<?php
/*
 This class contains all the cryptography alogorithm.
 Created By: SmartdataInc.
*/

define('basepath',dirname(__FILE__));

include_once('phpseclib/Crypt/RSA_XML.php');

class ConciergeApiHelper{

    public static function DigitalSignature($portalUsername,$rsaXML){
        
        $xmlrsa = new Crypt_RSA_XML();
        $xmlrsa->loadKeyfromXML($rsaXML);
        $signature = $xmlrsa->sign($portalUsername);
        
        return base64_encode($signature);
    
    }    
    
}

?>