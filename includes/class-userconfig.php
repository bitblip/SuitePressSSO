<?php
/*
 This class contains user global information
 Created Date: 21/March/2013
 Created By: SmartdataInc.
  
*/
class Userconfig{
    
    public static function read($name){

    	$suitepress_sso_options = get_option( 'suitepress_sso_option_name' );
    	
        $config = array('AccessKeyId' =>  $suitepress_sso_options['accesskeyid_0'],
                        'AssociationId' => $suitepress_sso_options['associationid_1'],
                        'SecretAccessKey' => $suitepress_sso_options['secretaccesskey_2'],
                        'SigningcertificateId' => $suitepress_sso_options['signingcertificateid_3'],
                        'SigningcertificatePath' => $suitepress_sso_options['singingcertificatexml_4'],
                        'PortalUrl' => $suitepress_sso_options['portalurl_5']
                        );

        
        return $config[$name];    
      
    }    
    
}
