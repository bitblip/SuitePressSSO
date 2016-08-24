<?php
/*
 Created Date: 30/april/2013
 Created By: SmartdataInc.
*/
include_once('Concierge.php');

class Event extends Concierge{
  
  public function __construct(){
   
   // Create object of the concierge class
    $this->api = new Concierge();
  }
  
  
  // Get Applicable Registration Fee
  public function RegistrationFeeRequest($accesskey,$associationid,$secreteaccessid,$eventID,$entityID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetApplicableRegistrationFees',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetApplicableRegistrationFees xmlns="http://membersuite.com/contracts">
                    <eventID>'.$eventID.'</eventID>
                    <entityID>'.$entityID.'</entityID>
                    </GetApplicableRegistrationFees>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetApplicableRegistrationFees');
    return $this->api->createobject($response,'GetApplicableRegistrationFees'); 
  }
  
  // Get Event Manifest
  public function GetEventManifestRequest($accesskey,$associationid,$secreteaccessid,$eventID,$entityID,$registrationFeeID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetEventManifest',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetEventManifest xmlns="http://membersuite.com/contracts">
                    <eventID>'.$eventID.'</eventID>
                    <entityID>'.$entityID.'</entityID>
                    <registrationFeeID>'.$registrationFeeID.'</registrationFeeID>
                    </GetEventManifest>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetEventManifest');
    return $this->api->createobject($response,'GetEventManifest'); 
  }
  
  // Get Event Manifest
  public function TransferRegistrationRequest($accesskey,$associationid,$secreteaccessid,$sourceRegistrationID,$destinationRegistrationFee,$batchToUse){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='TransferRegistration',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <TransferRegistration xmlns="http://membersuite.com/contracts">
                    <sourceRegistrationID>'.$sourceRegistrationID.'</sourceRegistrationID>
                    <destinationRegistrationFee>'.$destinationRegistrationFee.'</destinationRegistrationFee>
                    <batchToUse>'.$batchToUse.'</batchToUse>
                    </TransferRegistration>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='TransferRegistration');
    return $this->api->createobject($response,'TransferRegistration'); 
  }
  
  // Exhibit
  public function GetAvailableExhibitorRequest($accesskey,$associationid,$secreteaccessid,$showID,$entityID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAvailableExhibitorRegistrationWindows',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetAvailableExhibitorRegistrationWindows xmlns="http://membersuite.com/contracts">
                    <showID>'.$showID.'</showID>
                    <entityID>'.$entityID.'</entityID>
                    </GetAvailableExhibitorRegistrationWindows>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetAvailableExhibitorRegistrationWindows');
    return $this->api->createobject($response,'GetAvailableExhibitorRegistrationWindows'); 
  }
  
  public function GetAvaialbleExhibitBoothsRequest($accesskey,$associationid,$secreteaccessid,$showID,$entityID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAvaialbleExhibitBooths',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetAvaialbleExhibitBooths xmlns="http://membersuite.com/contracts">
                    <showID>'.$showID.'</showID>
                    <entityID>'.$entityID.'</entityID>
                    </GetAvaialbleExhibitBooths>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetAvaialbleExhibitBooths');
    return $this->api->createobject($response,'GetAvaialbleExhibitBooths'); 
  }
  
  public function RetrieveOrCreateExhibitRequest($accesskey,$associationid,$secreteaccessid,$showID,$entityID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='RetrieveOrCreateExhibitorRecord',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <RetrieveOrCreateExhibitorRecord xmlns="http://membersuite.com/contracts">
                    <showID>'.$showID.'</showID>
                    <entityID>'.$entityID.'</entityID>
                    </RetrieveOrCreateExhibitorRecord>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='RetrieveOrCreateExhibitorRecord');
    return $this->api->createobject($response,'RetrieveOrCreateExhibitorRecord'); 
  }
  
  public function RetrieveAccessibleRequest($accesskey,$associationid,$secreteaccessid,$showID,$entityID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='RetrieveAccessibleExhibitorRecords',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <RetrieveAccessibleExhibitorRecords xmlns="http://membersuite.com/contracts">
                    <showID>'.$showID.'</showID>
                    <entityID>'.$entityID.'</entityID>
                    </RetrieveAccessibleExhibitorRecords>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='RetrieveAccessibleExhibitorRecords');
    return $this->api->createobject($response,'RetrieveAccessibleExhibitorRecords'); 
  }
  
  public function CheckForExhibitorRequest($accesskey,$associationid,$secreteaccessid,$exhibitorID,$contactTypeID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='CheckForExhibitorContactRestriction',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <CheckForExhibitorContactRestriction xmlns="http://membersuite.com/contracts">
                    <exhibitorID>'.$exhibitorID.'</exhibitorID>
                    <contactTypeID>'.$contactTypeID.'</contactTypeID>
                    </CheckForExhibitorContactRestriction>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='CheckForExhibitorContactRestriction');
    return $this->api->createobject($response,'CheckForExhibitorContactRestriction'); 
  }
  
  public function CloneEventRequest($accesskey,$associationid,$secreteaccessid,$srcEventID,$msoNewEventValues,$includeConfirmationEmails,$includeRegistrationFees,$includeRegistrationQuestions,$includeEventMerchandise,$includeSupplementalInformationLinks,$includeSessionTracks,$includeSessionTimeslots,$includeSponsorshipInformation,$includeResources,$includeRooms){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='CloneEvent',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msoNewEventValues);
     $objecttype = '';
     foreach($objectarr as $key=>$value){
       if($key<>'ClassType'){ 
      $objecttype.= '<mem:FieldMetadata>
        <mem:Name>'.$key.'</mem:Name>
        <mem:Value>'.$value.'</mem:Value>
        </mem:FieldMetadata>';  
       }
      }
     
      $body = '<s:Body>
                    <CloneEvent xmlns="http://membersuite.com/contracts">
                    <srcEventID>'.$srcEventID.'</srcEventID>
                    <msoNewEventValues>
                      <mem:ClassType>'.$objectarr['ClassType'].'</mem:ClassType>
                      <mem:Fields>
                      '.$objecttype.'
                      </mem:Fields>
                    </msoNewEventValues>
                    <includeConfirmationEmails>'.$includeConfirmationEmails.'</includeConfirmationEmails>
                    <includeRegistrationFees>'.$includeRegistrationFees.'</includeRegistrationFees>
                    <includeRegistrationQuestions>'.$includeRegistrationQuestions.'</includeRegistrationQuestions>
                    <includeEventMerchandise>'.$includeEventMerchandise.'</includeEventMerchandise>
                    <includeSupplementalInformationLinks>'.$includeSupplementalInformationLinks.'</includeSupplementalInformationLinks>
                    <includeSessionTracks>'.$includeSessionTracks.'</includeSessionTracks>
                    <includeSessionTimeslots>'.$includeSessionTimeslots.'</includeSessionTimeslots>
                    <includeSponsorshipInformation>'.$includeSponsorshipInformation.'</includeSponsorshipInformation>
                    <includeResources>'.$includeResources.'</includeResources>
                    <includeRooms>'.$includeRooms.'</includeRooms>
                    </CloneEvent>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='CloneEvent');
    return $this->api->createobject($response,'CloneEvent'); 
  }
}
?>