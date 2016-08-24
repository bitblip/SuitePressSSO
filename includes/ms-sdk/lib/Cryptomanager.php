<?php
/*
 This class contains all the cryptography alogorithm.
 Created Date: 28/March/2013
 Created By: SmartdataInc.
*/
//include_once('phpseclib/Crypt/RSA_XML.php');

class CryptoManager{
    
    public static function GenerateDigitalSignature($portalUsername,$rsaXML){
        
       /* $xmlrsa = new Crypt_RSA_XML();
        $xmlrsa->loadKeyfromXML($rsaXML);
        $signature = $xmlrsa->sign($portalUsername);
        
        return base64_encode($signature);
       */
       return 'Use phpseclib to generate digital signature';
    }    
   
   public static function GenerateMessageSignature($method, $SecretAccessKey, $AssociationId, $SessionId = ""){
    
        $call  = "http://membersuite.com/contracts/IConciergeAPIService/$method";
        
        $secret = base64_decode($SecretAccessKey);
        $data = "$call$AssociationId$SessionId";
        
        return base64_encode(hash_hmac('sha1', $data, $secret, True));

   }
   
   
}

?>