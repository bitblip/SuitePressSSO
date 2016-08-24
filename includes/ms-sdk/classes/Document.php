<?php
/*
 Created Date: 30/april/2013
 Created By: SmartdataInc.
*/
include_once('Concierge.php');

class Document extends Concierge{
  
  public function __construct(){
   
   // Create object of the concierge class
    $this->api = new Concierge();
  }
  
  // Get File Cabinet Request
  public function GetFileCabinetRequest($accesskey,$associationid,$secreteaccessid,$targetID){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetFileCabinetRootFolder',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetFileCabinetRootFolder xmlns="http://membersuite.com/contracts">
                    <targetID>'.$targetID.'</targetID>
                    </GetFileCabinetRootFolder>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetFileCabinetRootFolder');
    return $this->api->createobject($response,'GetFileCabinetRootFolder'); 
  }
  
  // Describe Folder Request
  public function DescribeFolderRequest($accesskey,$associationid,$secreteaccessid,$folderID){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='DescribeFolder',$accesskey,$associationid,$secreteaccessid);
     
      // Construct Body
      $body = '<s:Body>
                    <DescribeFolder xmlns="http://membersuite.com/contracts">
                    <folderID>'.$folderID.'</folderID>
                    </DescribeFolder>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='DescribeFolder');
    return $this->api->createobject($response,'DescribeFolder'); 
  }
  
  // Delete folder tree
  public function DeleteFolderTreeRequest($accesskey,$associationid,$secreteaccessid,$folderID){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='DeleteFolderTree',$accesskey,$associationid,$secreteaccessid);
     
      // Construct Body
      $body = '<s:Body>
                    <DeleteFolderTree xmlns="http://membersuite.com/contracts">
                    <folderID>'.$folderID.'</folderID>
                    </DeleteFolderTree>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='DeleteFolderTree');
    return $this->api->createobject($response,'DeleteFolderTree'); 
  }
  
  // Search For Files within folder
  public function SearchForFilesRequest($accesskey,$associationid,$secreteaccessid,$folderID,$textToSearch,$startRecord,$pageSize){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SearchForFilesWithinFolder',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <SearchForFilesWithinFolder xmlns="http://membersuite.com/contracts">
                    <folderID>'.$folderID.'</folderID>
                    <textToSearch>'.$textToSearch.'</textToSearch>
                    <startRecord>'.$startRecord.'</startRecord>
                    <pageSize>'.$pageSize.'</pageSize>
                    </SearchForFilesWithinFolder>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='SearchForFilesWithinFolder');
    return $this->api->createobject($response,'SearchForFilesWithinFolder'); 
  }
  
  // Search For Files Globaly
  public function SearchForFilesGloballyRequest($accesskey,$associationid,$secreteaccessid,$textToSearch,$startRecord,$pageSize){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SearchForFilesGlobally',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <SearchForFilesGlobally xmlns="http://membersuite.com/contracts">
                    <textToSearch>'.$textToSearch.'</textToSearch>
                    <startRecord>'.$startRecord.'</startRecord>
                    <pageSize>'.$pageSize.'</pageSize>
                    </SearchForFilesGlobally>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='SearchForFilesGlobally');
    return $this->api->createobject($response,'SearchForFilesGlobally'); 
  }
  
}
?>