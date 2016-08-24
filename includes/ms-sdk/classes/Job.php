<?php
/*
 Created Date: 29/april/2013
 Created By: SmartdataInc.
*/
include_once('Concierge.php');

class Job extends Concierge{
  
  
  public function __construct(){
   
   // Create object of the concierge class
   
    $this->api = new Concierge();
    
  }
  
  // List All Objects
  public function JobPostingRequest($accesskey,$associationid,$secreteaccessid,$jobPostingID,$resumeID){
    
    // Get file content
    
     $filecontent = $this->api->GetFormat();
     
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ApplyToJobPosting',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     
     $body = '<s:Body>
                    <ApplyToJobPosting xmlns="http://membersuite.com/contracts">
                    <jobPostingID>'.$jobPostingID.'</jobPostingID>
                    <resumeID>'.$resumeID.'</resumeID>
                    </ApplyToJobPosting>
                    </s:Body>
                    ';
    
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ApplyToJobPosting');
    return $this->api->createobject($response,'ApplyToJobPosting'); 
  }
  
  
  
  // Describe object
  public function GetResumeRequest($accesskey,$associationid,$secreteaccessid,$resumeID){
    
    // Get file content
    
     $filecontent = $this->api->GetFormat();
     
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetResumeAsHtml',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     
     $body = '<s:Body>
                    <GetResumeAsHtml xmlns="http://membersuite.com/contracts">
                    <resumeID>'.$resumeID.'</resumeID>
                    </GetResumeAsHtml>
                    </s:Body>
                    ';
    
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetResumeAsHtml');
    
    return $this->api->createobject($response,'GetResumeAsHtml'); 
    
  }
  
  
}
?>