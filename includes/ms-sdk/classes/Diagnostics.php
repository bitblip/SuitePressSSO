<?php
/*
 Created Date: 29/april/2013
 Created By: SmartdataInc.
*/
include_once('Concierge.php');

class Diagnostics extends Concierge{
  
  public function __construct(){
   
   // Create object of the concierge class
    $this->api = new Concierge();
  }
  
  // Get API Version
  public function GeAPIVersionRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetConciergeAPIVersion',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     // This Method do not require body
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='GetConciergeAPIVersion');
    return $this->api->createobject($response,'GetConciergeAPIVersion'); 
  }
 
  // Flush Cache
  public function FlushCachesRequest($accesskey,$associationid,$secreteaccessid){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='FlushCaches',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     // This Method do not require body 
     // Create Response
    
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='FlushCaches');
    return $this->api->createobject($response,'FlushCaches'); 
  }
  
  // Flush Cache
  public function GetDiscussionRequest($accesskey,$associationid,$secreteaccessid,$targetID){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetDiscussionBoard',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetDiscussionBoard xmlns="http://membersuite.com/contracts">
                    <targetID>'.$targetID.'</targetID>
                    </GetDiscussionBoard>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
 
    $response = $this->api->SendSoapRequest($apirequest,$method='GetDiscussionBoard');
    return $this->api->createobject($response,'GetDiscussionBoard'); 
  }
  
  // Flush Cache
  public function SendEmailRequest($accesskey,$associationid,$secreteaccessid,$discussionPostId){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SendEmailsToSubscribedEntities',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <SendEmailsToSubscribedEntities xmlns="http://membersuite.com/contracts">
                    <discussionPostId>'.$discussionPostId.'</discussionPostId>
                    </SendEmailsToSubscribedEntities>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='SendEmailsToSubscribedEntities');
    return $this->api->createobject($response,'SendEmailsToSubscribedEntities'); 
  }
}
?>